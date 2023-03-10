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


    public function setTranslate($key,$value,$type,$lang,$itemId)
    {
        
        $checkTrans=translationString::where('translation_lang',$lang)->where('translation_key',$key)->where('translation_parent_type',$type)->where('translation_parent_id',$itemId)->first();
        if(!$checkTrans){
            //save translation
            $saveString=new translationString();
            $saveString->translation_key=$key;
            $saveString->translation_value=$value;
            $saveString->translation_lang=$lang;
            $saveString->translation_parent_type=$type;
            $saveString->translation_parent_id=$itemId;
            $saveString->save();
        }
        else{
            //update translation
            $checkTrans->update([
                'translation_value'=>$value
            ]);
        }

        return true;
    }

}


?>