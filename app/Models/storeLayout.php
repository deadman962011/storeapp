<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeLayout extends Model
{
    use HasFactory;

    protected $with=['items'];

    /**
     * Get all of the items for the storeLayout
     *
     */
    public function items()
    {
        $breakpoint=app('request')->route('breakpoint');
        if($breakpoint){
            $breakpoint=[$breakpoint];
        }
        else{
            $breakpoint=['desktop','mobile'];
        }
        // dd($breakpoint);
        
        return $this->hasMany(layoutItem::class, 'layout_id', 'id')->whereIn('item_breakpoint',$breakpoint);
    }



}
