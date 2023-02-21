<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class userRegisterRequest extends FormRequest
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
            'emailI'=>['required','unique:store_admins,email,'.$this->id,'unique:store_vendors,email,'.$this->id],
            'usernameI'=>['required','unique:store_admins,username,'.$this->id,'unique:store_vendors,username,'.$this->id],
            'passwordI'=>'required'
        ];
    }
    public function messages() //OPTIONAL
    {
        return [
            'emailI.required' => 'Email is required',
            'emailI.unique' => 'Email already in use',
            'usernameI.required' => 'Email is required',
            'usernameI.unique' => 'username already in use',
            'passwordI.required' => 'Password is required'
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
