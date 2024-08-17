<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name'=> 'unique:users|max:50|required',
            'email' => 'unique:users|max:50|required',
            'password' => 'min:8|required',
            'roles_id'=> 'required'
        ];
    }

    public function attributes()
    {
        return [
            'roles_id' => 'roles'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal :min Karakter',
            'roles_id.required' => 'Role Wajib Diisi'
        ];
    }
}
