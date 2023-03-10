<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\translationString;

class productProperty extends Model
{
    use HasFactory;

    public  $lang='en';
    protected $appends=['strings'];
    protected $with=['childs'];


    /**
     * Get all of the childs for the productProperty
     *
     */
    public function childs() 
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }


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
            ->where('translation_parent_type','property')
            ->where('translation_parent_id',$this->id)
            ->get();
        $tranlations=[];
        foreach ($getTranslations as $translation) {
            $tranlations[$translation['translation_key']]=$translation['translation_value'];
        }
        return $tranlations;
    }
}
