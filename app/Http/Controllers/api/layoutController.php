<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\storeLayout;

class layoutController extends Controller
{
    //


    public function show($lang,$breakpoint,$permalink)
    {   
        
        //get layout
        $getLayout=storeLayout::where('layout_permalink',$permalink)->first();
        if(!$getLayout){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'unable to find layout'], 204);
        }
        else{
            return response()->json(['success'=>true,'payload'=>$getLayout,'message'=>'layout successfully loaded'], 200);
        }

    }

}
