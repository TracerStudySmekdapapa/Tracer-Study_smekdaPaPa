<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPendidikanSimpanRequest extends FormRequest
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
            'nama_univ' => ['required', 'string', 'min:5'],
            'fakultas' => ['required', 'string', 'min:5'],
            'prodi' => ['nullable', 'string', 'min:5'],
            'alamat_univ' => ['required', 'string', 'min:10']
        ];
    }

    public function messages()
    {
        return [
            'nama_univ.required' => 'Nama Universitas harus diisi',
            'nama_univ.min' => 'Nama Universitas harus minimal 5 huruf',
            'fakultas.required' => 'Fakultas harus diisi',
            'fakultas.min' => 'Fakultas harus minimal 5 huruf',
            'prodi.min' => 'Fakultas harus minimal 5 huruf',
            'alamat_univ.required' => 'Alamat harus diisi',
            'alamat_univ.min' => 'Alamat harus minimal 5 huruf',
        ];
    }
}
