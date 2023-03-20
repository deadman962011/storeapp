<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

use App\Http\Requests\cp\vendor\brand\saveBrandRequest;
use App\Http\Requests\cp\vendor\brand\updateBrandRequest;

use App\Models\productBrand;
use App\Models\storeConfig;
use App\Models\translationString;


class brandController extends Controller
{
    use GeneralTrait;
    //

    public function index()
    {
       //get brands
       $brands=productBrand::all();
        // $brands=[];
       return view('vendorCpanel.brands.list',compact('brands'));
    }

    public function new()
    {
        return view('vendorCpanel.brands.new',);
    }

    public function store(saveBrandRequest $request)
    {
        //save brands
        $saveBrand=new productBrand();
        $saveBrand->brand_permalink=$request->brandPermalinkI;
        $saveBrand->save();

        //save strings
        $transArr=[
            [
                'key'=>'brand_name',
                'value'=>$request->brandNameI,
            ],
            [
                'key'=>'brand_desc',
                'value'=>$request->brandDescI,
            ],
        ];
        $lang=storeConfig::where('config_key','defaultLanguage')->first();
        $this->saveTranslateMany($transArr,'brand',$lang->config_value,$saveBrand['id']);
        return  redirect()->route('brand.index')->with('success', 'Brand Successfully Saved');

    }

    public function edit($brandId,$lang,updateBrandRequest $request)
    {
        
        //get brand
        $getBrand=productBrand::where('id',$brandId)->first();
        $getBrand->lang=$lang;
        $getBrand->append('strings');
        if(!$getBrand){
            return  redirect()->route('brand.index')->with('danget', 'Unable to find brand');
        }
        else{
            $flash['brandPermalinkI']=$getBrand->brand_permalink;
            $flash['itemId']=$getBrand->id;
            $flash['language']=$lang;
            if(count($getBrand->strings) > 0){
                $flash['brandDescI']=$getBrand->strings['brand_desc'];
                $flash['brandNameI']=$getBrand->strings['brand_name'];
            }
            session()->flashInput($flash);
            return view('vendorCpanel.brands.update');
        }
    }
    
    public function update($brandId,$lang,Request $request)
    {

        //get brand
        $getBrand=productBrand::where('id',$brandId)->first();
        $getBrand->lang=$lang;
        $getBrand->append('strings');
        if(!$getBrand){
            return  redirect()->route('brand.index')->with('danger', 'Unable to find brand');
        }
        else{
            //update strings 
            if($request->brandNameI){
                $this->setTranslate('brand_name',$request->brandNameI,'brand',$lang,$getBrand->id);
            }
            if($request->brandDescI){
                $this->setTranslate('brand_desc',$request->brandDescI,'brand',$lang,$getBrand->id);
            }

            //update brand
            $getBrand->update(['brand_permalink'=>$request->brandPermalinkI]);

            return  redirect()->route('brand.index')->with('success', 'Brand Successfully Updated');
        }
    }
}

