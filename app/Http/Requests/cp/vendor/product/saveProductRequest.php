<?php

namespace App\Http\Requests\cp\vendor\product;

use Illuminate\Foundation\Http\FormRequest;

class saveProductRequest extends FormRequest
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
        $rules['productTypeI']='required';
        $rules['productNameI']='required|min:3|unique:translation_strings,translation_value,'. $this->id .',id,translation_key,product_name';
        $rules['productShortDescI']='required|min:5|unique:translation_strings,translation_value,'. $this->id .',id,translation_key,product_short_desc';
        $rules['productPermalinkI']='required||min:3|unique:products,product_permalink,'.$this->id;
        $rules['productCatI']='required|exists:product_categories,id';
        $rules['productBrandI']='required|exists:product_brands,id';
        if($this->productTypeI==='simple'){
            $rules['productPriceI']='required|numeric';
            $rules['productSalePriceI']='nullable|numeric|max:'.$this->productPriceI;
            $rules['productSkuI']='required|unique:product_metas,meta_value,'. $this->id .',id,meta_key,product_sku';
            $rules['productQtyI']='required|numeric|min:1';
            $rules['productInStockI']='required';
            // $rules['productSoldindividuallyI']='required';
            $rules['productShippingWeightI']='nullable|numeric';
            $rules['productShippingLengthI']='nullable|numeric';
            $rules['productShippingWidthI']='nullable|numeric';
            $rules['productShippingHeightI']='nullable|numeric';
        }
        elseif($this->productTypeI==='variable'){
            $rules['productPropsI']='required|array|min:1';            
        }

        return $rules;
    }
}
