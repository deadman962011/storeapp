<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\translationString;

class productCategory extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('category_status',1);
    }
    
    public  $lang='en';
    protected $appends=['strings','productsCount'];
    protected $with=['parent'];
    
    /**
     * Get the parent associated with the productCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }


    public function getProductsCountAttribute(){

        return storeProduct::where('product_category',$this->id)->count();

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
            ->where('translation_parent_type','category')
            ->where('translation_parent_id',$this->id)
            ->get();
        $tranlations=[];
        foreach ($getTranslations as $translation) {
            $tranlations[$translation['translation_key']]=$translation['translation_value'];
        }
        return $tranlations;
    }
}
