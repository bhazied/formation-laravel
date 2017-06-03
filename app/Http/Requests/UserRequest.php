<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'mobile' => 'required|numeric|min:3',
        ];
        if( Str::lower($this->method()) == 'post'){
            return array_merge($rules, [
                'password' => 'required|min:3',
                'username' => 'required|min:3|unique:users',
                'email' => 'required|email|unique:users',
            ]);
        } else if(Str::lower($this->method()) == 'put' || Str::lower($this->method()) == 'patch'){
            return $rules;
        }
    }
}
