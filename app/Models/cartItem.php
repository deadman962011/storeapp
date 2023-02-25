<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartItem extends Model
{
    use HasFactory;
    protected $with=['product'];

    protected $fillable=['quantity'];

    /**
     * Get the product associated with the cartItem
     *
     */
    public function product()
    {
        return $this->hasOne(storeProduct::class, 'id', 'product_id')->without(['metas']);
    }

}
