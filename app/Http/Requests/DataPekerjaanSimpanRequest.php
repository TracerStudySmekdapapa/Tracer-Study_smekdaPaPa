<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPekerjaanSimpanRequest extends FormRequest
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
            'nama_pekerjaan' => ['required', 'string'],
            'nama_instansi' => ['required', 'string'],
            'jabatan' => ['nullable', 'string'],
            'tahun_masuk' => ['nullable', 'numeric', 'digits:4'],
            'tahun_keluar' => ['nullable', 'numeric', 'digits:4'],
            'alamat' => ['required', 'string', 'min:10']
        ];
    }

    public function messages()
    {
        return [
            'nama_pekerjaan.required' => 'Nama Pekerjaan harus diisi.',
            'nama_instansi.required' => 'Nama Instansi harus diisi.',
            'nama_univ.required' => 'Nama Pekerjaan harus diisi.',
            'tahun_masuk.digits' => 'Tahun masuk harus terdiri dari 4 digit.',
            'tahun_keluar.digits' => 'Tahun keluar harus terdiri dari 4 digit.',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Alamat harus minimal 10 huruf'
        ];
    }
}
