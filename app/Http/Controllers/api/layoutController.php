<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\storeLayout;
use App\Models\storeProduct;
use App\Models\productCategory;
class layoutController extends Controller
{
    //

    public function productOne($lang,$breakpoint,$productPermalink)
    {
        $getLayout=storeLayout::where('layout_permalink','product-one-page')->first();
        $getProduct=storeProduct::where('product_permalink',  $productPermalink)->with('variations')->first();
        $getProduct->lang=$lang;
        $getProduct->append('strings');
        if(!$getLayout || !$getProduct){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'unable to find layout or product'], 200);
        }
        else{
            return response()->json(['success'=>true,'payload'=> ['product'=>$getProduct,'layout'=>$getLayout],'message'=>'Product One layout successfully loaded'], 200);
        }
    }

    public function categoryOne($lang,$breakpoint,$categoryPermalink)
    {
        
        $getLayout=storeLayout::where('layout_permalink','category-one-page')->first();
        $getCategory=productCategory::where('category_permalink',  $categoryPermalink)->first();
        $getCategory->lang=$lang;
        $getCategory->append(['strings','products']);
        if(!$getLayout || !$getCategory){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'unable to find layout or product'], 404);
        }
        else{
            return response()->json(['success'=>true,'payload'=> ['category'=>$getCategory,'layout'=>$getLayout],'message'=>'Category One layout successfully loaded'], 200);
        }
    }


    public function show($lang,$breakpoint,$permalink)
    {   
        
        $prod=new storeProduct();
        $prod->lang=$lang;
        $prod->append('strings');

        //get layout
        $getLayout=storeLayout::where('layout_permalink',$permalink)->first();
        if(!$getLayout){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'unable to find layout'], 200);
        }
        else{
            return response()->json(['success'=>true,'payload'=>$getLayout,'message'=>'layout successfully loaded'], 200);
        }



    }

}
