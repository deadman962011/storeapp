<?php

namespace App\Http\Requests\cp\vendor\config;

use Illuminate\Foundation\Http\FormRequest;

class saveConfigRequest extends FormRequest
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
            //config_name	config_key	config_value	config_sub_value	config_desc
            'configNameI'=>'required|unique:store_configs,config_name'.$this->id,
            'configKeyI'=>'required|unique:store_configs,config_key'.$this->id,
            'configValueI'=>'required',
            'configSubValueI'=>'required',
            'configDescI'=>'required'
        ];
    }
}
