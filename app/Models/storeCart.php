<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeCart extends Model
{
    use HasFactory;

    protected $appends=['totalAmount'];
    protected $with=['items'];

    /**
     * Get all of the items for the storeCart
     *
     */
    public function items()
    {
        return $this->hasMany(cartItem::class, 'cart_id', 'id');
    }

    public function getTotalAmountAttribute()
    {

        //get products prices 
        $getItems=cartItem::where('cart_id',$this->id)->pluck('product_id');
        $getProductsPrices=storeProduct::whereIn('id',$getItems)->get()->pluck('price')->sum();
        if($getItems){
            return $getProductsPrices;
        }
        else{
            return 0;
        }
    }
}
