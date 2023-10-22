<?php

namespace App\Http\Requests;

use App\Models\Pribadi;
use Illuminate\Foundation\Http\FormRequest;

class DataPribadiUpdateRequest extends FormRequest
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
        $alumni = Pribadi::where('id_user', $this->id)->first();
        return [
            'nisn' => ['required', 'numeric', 'min:10', ($alumni->nisn == $this->nisn ? '' : 'unique:data_pribadi,nisn')],
            'no_telp' => ['required', 'numeric', 'min:10'],
            'agama' => ['required', 'string'],
            'tmp_lahir' => ['required', 'string'],
            'tgl_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'string'],
            'jurusan' => ['required', 'numeric'],
            'tamatan' => ['required', 'string'],
        ];
    }
}
