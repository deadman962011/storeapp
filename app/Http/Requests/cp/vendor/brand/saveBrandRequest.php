<?php

namespace App\Http\Requests\cp\vendor\brand;

use Illuminate\Foundation\Http\FormRequest;

class saveBrandRequest extends FormRequest
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
        return [
            'brandNameI'=>[
                'required',
                'unique:translation_strings,translation_value,'. $this->id .',id,translation_key,brand_name',
            ],
            'brandPermalinkI'=>'required|unique:product_brands,brand_permalink,'.$this->id,
        ];
    }
}
