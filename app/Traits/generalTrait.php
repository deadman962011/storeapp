<?php

namespace App\Traits;

use App\Models\translationString;

trait GeneralTrait { 


    public function saveTranslateMany($trans,$type,$id)
    {
        $transArr=[];

        foreach ($trans as $translation) {
            $transItem['translation_key']=$translation['key'];
            $transItem['translation_value']=$translation['value'];
            $transItem['translation_lang']='en';
            $transItem['translation_parent_type']=$type;
            $transItem['translation_parent_id']=$id;
            array_push($transArr,$transItem);

            # code...
        }
        
        $saveStrings=translationString::insert($transArr);

    }



}


?>