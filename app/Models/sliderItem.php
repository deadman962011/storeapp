<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sliderItem extends Model
{
    use HasFactory;

    public  $lang='en';
    protected $appends=['strings'];
	
    protected $fillable=['slide_action','slide_value','slide_status','slide_sort','slide_btn_position'];

    public function getStringsAttribute()
    {
        $lang=app('request')->route('lang');
        if(app('request')->routeIs('api.*') && $lang){
            $language=$lang;
        }
        else{
            $language=$this->lang;
        }
        
        $getTranslations=translationString::where('translation_lang',$language)
            ->where('translation_parent_type','slide')
            ->where('translation_parent_id',$this->id)
            ->get();
        $tranlations=[];
        foreach ($getTranslations as $translation) {
            $tranlations[$translation['translation_key']]=$translation['translation_value'];
        }
        return $tranlations;
    }


}
