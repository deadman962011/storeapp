<?php

namespace App\Http\Requests\cp\vendor\slider\slide;

use Illuminate\Foundation\Http\FormRequest;

class saveSlideRequest extends FormRequest
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

        $rules['sliderTitleI']='required|unique:translation_strings,translation_value,'. $this->id .',id,translation_key,slide_title';
        $rules['sliderTextI']='required|unique:translation_strings,translation_value,'. $this->id .',id,translation_key,slide_text';
        $rules['slideBtnPositionI']='required';
        $rules['slideActionI']='required';
        $actionRules=['required'];
        if($this->slideActionI==='category'){
            array_push($actionRules,'exists:product_categories,id');
        }
        elseif($this->slideActionI==='brand'){
            array_push($actionRules,'exists:product_brands,id');
        }
        $rules['slideActionValueI']=$actionRules;
        return $rules;
    }
}
