<?php

namespace App\Http\Requests\cp\vendor\property;

use Illuminate\Foundation\Http\FormRequest;

class savePropertyRequest extends FormRequest
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


        $rules['propertyTypeI']=['required'];
        $rules['propertyValueI']=['required'];
        if($this->propertyTypeI==='parent'){
            $rules['propertyNameI']=[
                'required',
                'unique:translation_strings,translation_value,'. $this->id .',id,translation_key,property_name',
            ];
        }
        elseif($this->propertyTypeI==='child'){
            $rules['propertyNameI']=['required'];
        }
        return $rules;
    }
    public function messages() //OPTIONAL
    {
        return [
            'propertyNameI.required' => 'property name is required',
            'propertyNameI.unique'=>'property name already used',
            'propertyTypeI.required' => 'property type is required',
            'propertyValueI.required'=>'property value is required',
            // 'categoryDescI.string'=>'category description should be string',
            // 'categorySubI.numeric'=>'category sub should be numeric'
        ];
    }
}
