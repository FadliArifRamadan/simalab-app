<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabCreateRequest extends FormRequest
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
            'lab_name'=> 'unique:labs|max:50|required',
            'description' => 'max:50|required'
        ];
    }

    public function messages()
    {
        return [
            'lab_name.required' => 'Nama Lab Wajib Diisi',
            'lab_name.max' => 'Nama Lab Maksimal :max Karakter',
            'description.required' => 'Deskripsi Wajib Diisi',
            'description.max' => 'Deskripsi Maksimal :max Karakter'
        ];
    }
}
