<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeSlider extends Model
{
    use HasFactory;
    protected $with=['slides'];

    public function scopeActive($query)
    {
        return $query->where('slider_status',1);
    }

    /**
     * Get all of the slides for the storeSlider
     *
     */
    public function slides()
    {
        return $this->hasMany(sliderItem::class, 'slider_id', 'id');
    }


}
