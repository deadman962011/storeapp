<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class storeVendor extends Authenticatable 
{
    use HasFactory;

    // protected $appends=['balance'];



    public function getBalanceAttribute()
    {

        //paid orders
        $totalAmount=0;
        $ableToWithdraw=0;
        
        //generate totalAmount
        $totalCartItems=cartItem::whereIn('cart_id',storeOrder::where('order_status','1')->pluck('cart_id'))->whereRelation('product','product_vendor',$this->id)->get()->pluck('product.price','quantity');
        foreach ($totalCartItems as $key => $value) {
           $amount=$key*$value;
           $totalAmount=$totalAmount+$amount;
        }

        //generate ableToWithdraw
        $ableToWtihdrawCartItems=cartItem::whereIn('cart_id',storeOrder::where('order_status','1')->where('created_at','0')->pluck('cart_id'))->whereRelation('product','product_vendor',$this->id)->get()->pluck('product.price','quantity');
        foreach ($ableToWtihdrawCartItems as $key => $value) {
           $amount=$key*$value;
           $ableToWithdraw=$totalAmount+$amount;
        } 
        
        //get withdraw executed requests

            //

        return ['totalAmount'=>$totalAmount,'ableToWithdraw'=>$ableToWithdraw];
    }



    protected $hidden = ['password'];

}
