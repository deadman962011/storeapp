<?php

namespace App\Http\Requests\cp\vendor;

use Illuminate\Foundation\Http\FormRequest;

class vendorLoginRequest extends FormRequest
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
            'emailI'=>'required',
            'passwordI'=>'required'
        ];
    }
    
    public function messages() //OPTIONAL
    {
        return [
            'usernameI.required' => 'username is required',
            'passwordI.required' => 'Password is required'
        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'success'   => false,
    //         'message'   => 'Validation errors',
    //         'payload'      => $validator->errors()
    //     ]));
    // }
}
