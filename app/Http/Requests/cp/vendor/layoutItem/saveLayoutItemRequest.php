<?php

namespace App\Http\Requests\cp\vendor\layoutItem;

use Illuminate\Foundation\Http\FormRequest;

class saveLayoutItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        $rules['layoutItemTypeI']='required';
        $rules['layoutItemBreakpointI']='required';
        $rules['layoutIdI']='required|exists:store_layouts,id';
        if($this->layoutItemTypeI==='list'){
            $rules['layoutItemTaxonomyI']='required';

            if($this->layoutItemTaxonomyI==='category'){
                $table='product_categories';
            }
            elseif($this->layoutItemTaxonomyI==='brand'){
                $table='product_brands';
            }
            elseif($this->layoutItemTaxonomyI==='tag'){

            }
            $rules['layoutItemTaxonomyIdI']='required|exists:'.$table.',id';
            $rules['productCountI']='required|min:1';
        }
        elseif($this->layoutItemTypeI==='slider'){
            $rules['layoutItemSliderIdI']='required|exists:store_sliders,id';
        }


        return $rules;
    }
}
