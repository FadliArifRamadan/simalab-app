<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocCreateRequest extends FormRequest
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
            'users_id'=> 'required',
            'documents_id' => 'required',
            'description' => 'max:50|required',
            'file_path' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'users_id' => 'user'
        ];
    }

    public function messages()
    {
        return [
            'users_id.required' => 'User Wajib Diisi',
            'documents_id.required' => 'Jenis Dokumen Wajib Diisi',
            'description.required' => 'Deskripsi Wajib Diisi',
            'description.max' => 'Deskripsi Maksimal :max Karakter',
            'file_path.required' => 'Upload Wajib Diisi'
        ];
    }
}
