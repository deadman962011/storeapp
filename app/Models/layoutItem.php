<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layoutItem extends Model
{
    use HasFactory;


    protected $appends=['attachment'];


    public function getAttachmentAttribute(){

        if($this->item_type==='list'){

            if($this->attachment_type==='category'){
                $attachment=productCategory::find($this->attachment_id);
                $attachment['products']=product::active()->parent()->where('product_category',$attachment->id)->limit($this->item_items_count)->get();
            }
            elseif($this->attachment_type==='brand'){
                $attachment=productBrand::find($this->attachment_id);
                $attachment['products']=product::active()->parent()->where('product_brand',$attachment->id)->limit($this->item_items_count)->get();
            }
            elseif($this->attachment_type==='tag'){
                // productCategory::find($this->attachment_id);
            }

        }
        elseif($this->item_type==='slider'){
            $attachment=storeSlider::find($this->attachment_id);
        }



        return $attachment;

    }


}
