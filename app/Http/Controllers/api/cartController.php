<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\storeCart;
use App\models\cartItem;

class cartController extends Controller
{
    //
    public function init()
    {
        $saveCart=new storeCart();
        $saveCart->cart_identifier=bin2hex(random_bytes(16));
        $saveCart->save();
        return response()->json(['success'=>true,'payload'=>$saveCart,'message'=>'Cart Successfully initialized'], 201);
    }
 
    public function get($id)
    {
        //check cart
        $getCart=storeCart::where('cart_identifier',$id)->first();
        if(!$getCart){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to find Cart '], 200);
        }

        return response()->json(['success'=>true,'payload'=>$getCart,'message'=>'Cart Successfully loaded'], 200);
    }



    public function add($id,Request $request)
    {

        //check cart
        $getCart=storeCart::where('cart_identifier',$id)->first();
        if(!$getCart){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to find Cart '], 200);
        }
        $checkItem=cartItem::where('cart_id',$getCart->id)->where('product_id',$request->productIdI)->first();
        if($checkItem){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Item Already in Cart'], 200);
        }
        $saveCartItem=new cartItem();
        $saveCartItem->product_id=$request->productIdI;
        $saveCartItem->cart_id=$getCart->id;
        $saveCartItem->save();
        return response()->json(['success'=>true,'payload'=>storeCart::where('cart_identifier',$id)->first(),'message'=>'Cart Item Successfully Saved'], 201);
            
    }

    public function remove($id,Request $request)
    {
        //check cart
        $getCart=storeCart::where('cart_identifier',$id)->first();
        if(!$getCart){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to find Cart '], 200);
        }
        $checkItem=cartItem::where('cart_id',$getCart->id)->where('product_id',$request->productIdI)->first();
        if(!$checkItem){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to remove item from cart'], 200);
        }
        
        $checkItem->delete();
        return response()->json(['success'=>true,'payload'=>storeCart::where('cart_identifier',$id)->first(),'message'=>'Cart Item Successfully Deleted'], 200);
    }

    public function increase($id,Request $request)
    {
        //check cart
        $getCart=storeCart::where('cart_identifier',$id)->first();
        if(!$getCart){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to find Cart '], 200);
        }
        
        //update cartItem
        $checkItem=cartItem::where('cart_id',$getCart->id)->where('product_id',$request->productIdI)->first();
        if(!$checkItem){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to increase item from cart'], 200);
        }
        $checkItem->increment('quantity');
        // $qty=$checkItem->quantity+1;
        // update([
        //     'quantity'=>$qty
        // ]);
        
        return response()->json(['success'=>true,'payload'=>storeCart::where('cart_identifier',$id)->first(),'message'=>'Cart Item quantity increased successfully'], 200);

    }

    public function reduce($id,Request $request)
    {
        //check cart
        $getCart=storeCart::where('cart_identifier',$id)->first();
        if(!$getCart){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to find Cart '], 400);
        } 

        //update cartItem
        $checkItem=cartItem::where('cart_id',$getCart->id)->where('product_id',$request->productIdI)->first();
        if(!$checkItem){
            return response()->json(['success'=>false,'payload'=>null,'message'=>'Unable to reduce item from cart'], 400);
        }

        if($checkItem->quantity > 0 &&  $checkItem->quantity ===1){
            //remove cartItem
            $checkItem->delete();
            return response()->json(['success'=>true,'payload'=>storeCart::where('cart_identifier',$id)->first(),'message'=>'Cart Item Successfully removed'], 200);
        }
        else{
            $checkItem->decrement('quantity');
            // $qty=$checkItem->qunatity - 1;
            // update([
            //     'quantity'=>$qty
            // ]);
            return response()->json(['success'=>true,'payload'=>storeCart::where('cart_identifier',$id)->first(),'message'=>'Cart Item reduced Successfully'], 200);
        }
    }
}
