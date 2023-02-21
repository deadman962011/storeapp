<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

use App\Http\Requests\cp\vendor\brand\saveBrandRequest;

use App\Models\productBrand;
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
        $this->saveTranslateMany($transArr,'brand',$saveBrand['id']);


        return  redirect()->route('brand.index')->with('success', 'Brand Successfully Saved');

    }

}
