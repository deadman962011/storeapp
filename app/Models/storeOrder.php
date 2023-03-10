<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeOrder extends Model
{
    use HasFactory;

    protected $with=['cart','payment'];


    /**
     * Get the cart associated with the storeOrder
     *
     */
    public function cart()
    {
        return $this->hasOne(storeCart::class, 'id', 'cart_id');
    }

    /**
     * Get the payment associated with the storeOrder
     *
     */
    public function payment()
    {
        return $this->hasOne(storePayment::class, 'id', 'payment_id');
    }



}
