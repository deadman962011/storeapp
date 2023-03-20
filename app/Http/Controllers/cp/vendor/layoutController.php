<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\cp\vendor\layout\saveLayoutRequest;
use App\Models\storeLayout;


class layoutController extends Controller
{
    // use GeneralTrait;
    //

    public function index()
    {
       //get categories
    //    $categories=productCategory::all();
        $type='all';
        return view('vendorCpanel.layouts.list',compact('type'));
    }

    public function new()
    {

        return view('vendorCpanel.layouts.new');
    }

    public function store(saveLayoutRequest $request)
    {
        //save categories
        $saveLayout=new storeLayout();
        $saveLayout->layout_name=$request->layoutNameI;
        $saveLayout->layout_desc=$request->layoutDescI;
        $saveLayout->layout_permalink=$request->layoutPermalinkI;
        $saveLayout->save();

        return  redirect()->route('layout.index')->with('success', 'Layout Successfully Saved');

    }

    public function show($permalink)
    {
        
        $layout=storeLayout::where('layout_permalink',$permalink)->first();
        if(!$layout){
            return  redirect()->route('layout.index')->with('danger', 'Unable to find Layout  ');
        }

        return view('vendorcpanel.layouts.show',compact('layout'));

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
