<?php

namespace App\Http\Requests\api\user\mobile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class registerMobileRequest extends FormRequest
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
            'nameI'=>'required',
            'phoneI'=>'required|unique:store_users,phone',
            'emailI'=>'required|email|unique:store_users,email'.$this->id,
            'passwordI'=>'required|min:8|confirmed',
            'passwordI_confirmation'=>'required|min:8'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'payload'      => $validator->errors()
        ]));
    }
}
