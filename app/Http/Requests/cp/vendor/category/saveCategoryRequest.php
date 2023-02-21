<?php

namespace App\Http\Requests\cp\vendor\category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class saveCategoryRequest extends FormRequest
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
            //
            'categoryNameI'=>[
                'required',
                'unique:translation_strings,translation_value,'. $this->id .',id,translation_key,category_name',
            ],
            'categoryPermalinkI'=>'required|unique:product_categories,category_permalink,'.$this->id,
            'categoryTypeI'=>'required',
            // 'categoryDescI'=>'string',
            // 'categorySubI'=>'numeric'
        ];
    }
    public function messages() //OPTIONAL
    {
        return [
            'categoryNameI.required' => 'category name is required',
            'categoryPermalinkI.required' => 'category permalink is required',
            // 'categoryDescI.string'=>'category description should be string',
            'categoryTypeI.required'=>'category type is required',
            // 'categorySubI.numeric'=>'category sub should be numeric'
        ];
    }
}
