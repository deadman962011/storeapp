<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

use App\Http\Requests\cp\vendor\property\savePropertyRequest;


use App\Models\productProperty;
use App\Models\translationString;
use App\Models\storeConfig;

class propertyController extends Controller
{
    //
    use GeneralTrait;


    public function index()
    {
        

        //get parent properties
        $properties=productProperty::where('property_type','parent')->get();
        return view('vendorCpanel.properties.list',['properties'=>$properties]);

    }

    public function new()
    {
        return view('vendorCpanel.properties.new');
    }
    
    public function childNew($propId)
    {
        //get property
        $property=productProperty::where('property_type','parent')->where('id',$propId)->first();
        return view('vendorCpanel.properties.newChild',compact('property'));

    }

    public function store(savePropertyRequest $request)
    {
        
        //save property
        $saveProperty=new productProperty();
        $saveProperty->property_type=$request->propertyTypeI;
        $saveProperty->property_value=$request->propertyValueI;
        if($request->propertyTypeI==='child'){
            $saveProperty->parent_id=$request->propertyParentI;
        }
        $saveProperty->save();

        //save strings
        $transArr=[
            [
                'key'=>'property_name',
                'value'=>$request->propertyNameI,

            ],
            [
                'key'=>'property_desc',
                'value'=>$request->propertyDescI,
            ],
        ];
        $lang=storeConfig::where('config_key','defaultLanguage')->first();
        $this->saveTranslateMany($transArr,'property',$lang->config_value,$saveProperty['id']);


        return  redirect()->route('property.index')->with('success', 'Property Successfully Saved');

    }


}
