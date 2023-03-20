<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\storeOrder;

class orderController extends Controller
{
    //
    public function get($id)
    {
        $getOrder=storeOrder::where('order_identifier',$id)->first();
        if(!$getOrder){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to find Order '], 200);
        }

        return response()->json(['success'=>true,'payload'=>$getOrder,'message'=>'Order Successfully fetched '], 200);
    }

    
}
