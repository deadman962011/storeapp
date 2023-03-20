<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use DataTables;
use App\Http\Requests\cp\vendor\category\saveCategoryRequest;
use App\Http\Requests\cp\vendor\category\updateCategoryRequest;

use App\Models\productCategory;
use App\Models\translationString;
use App\Models\storeConfig;


class categoryController extends Controller
{
    use GeneralTrait;
    //

    public function index()
    {
       //get categories
    //    $categories=productCategory::all();
        $type='all';
        return view('vendorCpanel.categories.list',compact('type'));
    }

    public function new()
    {
        //get categories
        $categories=productCategory::where('category_type','main')->get();
        return view('vendorCpanel.categories.new',['categories'=>$categories]);
    }

    public function store(saveCategoryRequest $request)
    {;
        //save categories
        $saveCategory=new productCategory();
        $saveCategory->category_permalink=$request->categoryPermalinkI;
        $saveCategory->category_type=$request->categoryTypeI;
        if($request->categoryTypeI==='sub'){
            $saveCategory->parent_id=$request->categoryParentI;
        }
        elseif($request->categoryTypeI==='child'){
            $saveCategory->parent_id=$request->categorySubI;
        }
        $saveCategory->save();

        //save strings
        $transArr=[
            [
                'key'=>'category_name',
                'value'=>$request->categoryNameI,
            ],
            [
                'key'=>'category_desc',
                'value'=>$request->categoryDescI,
            ],
        ];
        
        //get default language 
        $lang=storeConfig::where('config_key','defaultLanguage')->first();
        $this->saveTranslateMany($transArr,'category',$lang->config_value,$saveCategory['id']);

        return  redirect()->route('category.index')->with('success', 'Category Successfully Saved');

    }

    public function byType($type)
    {
        $types=['main','sub','child'];
        if(!in_array($type, $types)){ 
            $type='all';
        }
        return view('vendorCpanel.categories.list',compact('type'));
    }

    public function datatables($type)
    {
        $types=['main','sub','child'];
        if(in_array($type, $types)){
            $categories=productCategory::where('category_type',$type)->get();
        }
        else{
            $categories=productCategory::all();
        }

        return DataTables::of($categories)
        ->addColumn('languages',function($row){

            $langLinks='';
            $configs=storeConfig::where('config_type','language')->get();
            foreach ($configs as $language) {   $langLinks=$langLinks.'<a href="'.route('category.edit.get',['categoryId'=>$row->id,'lang'=>$language->config_key]).'">'.$language->config_key.'</a> ' ;};
            $languagesCol='<td>'. $langLinks.'</td>';
            return $languagesCol;
        })
        ->addColumn('action', function($row){
                    

                    $actionBtn='<div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">suspend</a>
                                        <a class="dropdown-item" href="#">delete</a>
                                    </div>
                                </div>';

                    return $actionBtn;
        })
                ->rawColumns(['action','languages'])
                ->make(true);
    }



    public function edit($categoryId,$lang,updateCategoryRequest $request)
    {
        
        //get category
        $getCategory=productCategory::where('id',$categoryId)->first();
        $getCategory->lang=$lang;
        $getCategory->append('strings');
        if(!$getCategory){
            return  redirect()->route('category.index')->with('danget', 'Unable to find category');
        }
        else{
            $flash=['categoryPermalinkI'=>$getCategory->category_permalink,];
            $flash['itemId']=$getCategory->id;
            $flash['categoryTypeI']=$getCategory->category_type;
            if($getCategory->category_type==='sub'){
                $flash['categoryParentI']=$getCategory->parent_id;  
            }
            if($getCategory->category_type==='child' || $getCategory->parent && $getCategory->parent->category_type==='sub'){
                $flash['categoryParentI']=$getCategory->parent->parent_id; 
                $flash['categorySubI']=$getCategory->parent->id;
            }
            $flash['language']=$lang;
            if(count($getCategory->strings) > 0){
                $flash['categoryNameI']=$getCategory->strings['category_name'];
                $flash['categoryDescI']=$getCategory->strings['category_desc'];
            }
            // dd($flash);
            session()->flashInput($flash);
            $categories=productCategory::where('category_type','main')->get();
            return view('vendorCpanel.categories.update',['categories'=>$categories]);
        }
    }


    
    public function update($categoryId,$lang,Request $request)
    {
        // dd($request->all());

        //get category
        $getCategory=productCategory::where('id',$categoryId)->first();
        $getCategory->lang=$lang;
        $getCategory->append('strings');
        if(!$getCategory){
            return  redirect()->route('category.index')->with('danger', 'Unable to find category');
        }
        else{
            //update strings 
            if($request->categoryNameI){
                $this->setTranslate('category_name',$request->categoryNameI,'category',$lang,$getCategory->id);
            }
            if($request->categoryDescI){
                $this->setTranslate('category_desc',$request->categoryDescI,'category',$lang,$getCategory->id);
            }

            //update brand
            $getCategory->update(['category_permalink'=>$request->categoryPermalinkI]);

            return  redirect()->route('category.index')->with('success', 'Category Successfully Updated');
        }
    }















}
