<?php

namespace App\Traits;

use Illuminate\Http\Request;

use App\Models\productMeta;

trait ProductTrait {


    public function getMeta($key,$productId)
    {
        $meta=productMeta::where('meta_key',$key)->where('product_id',$productId)->get();
        return $meta;
    }

    public function saveMeta($key, $value,$productId ) {

        try {
            
            $saveMeta=new productMeta();
            $saveMeta->meta_key=$key;
            $saveMeta->meta_value=$value;
            $saveMeta->product_id=$productId;
            $saveMeta->save();

        } catch (\Throwable $th) {
            return  redirect()->back()->with('danger', 'Unable to save '.$key.' meta');
        }
    }

    public function setMeta($key,$value,$productId)
    {
        $getMeta=productMeta::where('meta_key',$key)->where('product_id',$productId)->first();
        if(!$getMeta){
            $this->saveMeta($key,$value,$productId);
        }
        else{
            $getMeta->update(['meta_value'=>$value]);
        }
    }

    public function saveMetaMany($meta,$id)
    {
        
        # code...
    }

    public function combinations($arrays, $i = 0) {
        if (!isset($arrays[$i])) {
            return array();
        }
        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }
    
        // get combinations from subsequent arrays
        $tmp = $this->combinations($arrays, $i + 1);
    
        $result = array();
    
        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ? 
                    array_merge(array($v), $t) :
                    array($v, $t);
            }
        }

        return  $result;
    }

}