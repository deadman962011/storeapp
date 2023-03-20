<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\api\order\saveOrderRequest;
use App\models\storeCart;
use App\models\storePayment;
use App\models\storeOrder;

use Auth;

class cashOnDeleveryController extends Controller
{
    //
    public function request(saveOrderRequest $request)
    {

        //get cart
        $getCart=storeCart::where('cart_identifier',$request->cartIdentifierI)->first();

        //get user
        $user=Auth::guard('api')->user();

        //save payment
        $savePayment=new storePayment();
        $savePayment->payment_method=$request->paymentMethodI;
        $savePayment->payment_token=bin2hex(random_bytes(8));
        $savePayment->payment_status=0;
        $savePayment->payment_amount=$request->amountI;
        $savePayment->save();


        //save order
        $saveOrder=new storeOrder();
        $saveOrder->order_identifier=bin2hex(random_bytes(8));
        $saveOrder->order_status=0;
        $saveOrder->cart_id=$getCart->id;
        $saveOrder->user_id=$user->id;
        $saveOrder->payment_id=$savePayment->id;
        $saveOrder->save();

        //getOrder
        $getOrder=storeOrder::find($saveOrder->id);

        return response()->json(['success'=>true,'payload'=>$getOrder,'message'=>'Order Successfully saved'], 200);        

    }



}
