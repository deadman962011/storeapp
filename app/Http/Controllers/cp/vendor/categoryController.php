<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use DataTables;
use App\Http\Requests\cp\vendor\category\saveCategoryRequest;

use App\Models\productCategory;
use App\Models\translationString;

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
        $this->saveTranslateMany($transArr,'category',$saveCategory['id']);

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
                    return 'en      ar ';
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
                ->rawColumns(['action'])
                ->make(true);
        // return response()->json($categories, 200);

    }


}
