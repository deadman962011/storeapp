<?php

namespace App\Http\Requests\cp\vendor\layout;

use Illuminate\Foundation\Http\FormRequest;

class saveLayoutRequest extends FormRequest
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
        $rules['layoutNameI']='required|unique:store_layouts,layout_name'.$this->id;
        $rules['layoutPermalinkI']='required|unique:store_layouts,layout_permalink'.$this->id;
        return $rules;
     
    }
}
