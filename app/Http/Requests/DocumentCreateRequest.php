<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentCreateRequest extends FormRequest
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
            'name'=> 'unique:documents|max:30|required',
            'description' => 'max:50|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Dokumen Wajib Diisi',
            'name.max' => 'Nama Dokumen Maksimal :max Karakter',
            'description.required' => 'Deskripsi Wajib Diisi',
            'description.max' => 'Deskripsi Maksimal :max Karakter'
        ];
    }
}
