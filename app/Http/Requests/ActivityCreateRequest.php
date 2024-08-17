<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityCreateRequest extends FormRequest
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
            'activity_type'=> 'max:100|required',
            'coordinators_id'=> 'required',
            'description' => 'max:50|required'
        ];
    }

    public function messages()
    {
        return [
            'activity_type.required' => 'Nama Jenis Kegiatan Wajib Diisi',
            'activity_type.max' => 'Nama Jenis Kegiatan Maksimal :max Karakter',
            'coordinators_id.required' => 'Nama Koordinator Lab Wajib Diisi',
            'description.required' => 'Deskripsi Wajib Diisi',
            'description.max' => 'Deskripsi Maksimal :max Karakter',
        ];
    }

}
