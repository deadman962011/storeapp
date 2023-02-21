<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class productBrand extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('brand_status',1);
    }

    public  $lang='en';
    protected $appends=['strings','productsCount'];

    public function getProductsCountAttribute(){

        return product::where('product_brand',$this->id)->count();

    }
    
    public function getStringsAttribute()
    {
        $lang=app('request')->route('lang');
        if($lang){
            $language=$lang;
        }
        else{
            $language=$this->lang;
        }
        
        $getTranslations=translationString::where('translation_lang',$language)
            ->where('translation_parent_type','brand')
            ->where('translation_parent_id',$this->id)
            ->get();
        $tranlations=[];
        foreach ($getTranslations as $translation) {
            $tranlations[$translation['translation_key']]=$translation['translation_value'];
        }
        return $tranlations;
    }


}
