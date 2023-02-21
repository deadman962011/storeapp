<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeConfig extends Model
{
    use HasFactory;


    public function scopeCurrency($query)
    {
        return $query->where('config_type','currency');
    }

    public function scopeGeneral($query)
    {
        return $query->where('config_type','general');
    }

}
