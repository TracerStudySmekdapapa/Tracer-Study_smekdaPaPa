<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPribadiSimpanRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nisn' => ['nullable', 'integer', 'min:10'],
            'no_telp' => ['nullable', 'integer', 'min:10'],
            'agama' => ['nullable', 'string'],
            'tmp_lahir' => ['nullable', 'string'],
            'tgl_lahir' => ['nullable', 'date'],
            'jenis_kelamin' => ['nullable', 'string'],
            'jurusan' => ['nullable', 'integer'],
            'tamatan' => ['nullable', 'string'],
        ];
    }
}
