<?php

namespace App\Http\Requests;

use App\Models\Pribadi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DataPribadiUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // dd($this->route('id'));
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (Auth::user()->hasRole('Alumni') || Auth::user()->hasRole('Admin')) {
            $alumni = Auth::user()->hasRole('Alumni') ? Pribadi::where('id_user', $this->id)->first() : Pribadi::where('id_pribadi', $this->id)->first();

            return [
                'nisn' => ['nullable', 'numeric', 'digits_between:5,11', ($alumni->nisn == $this->nisn ? '' : 'unique:data_pribadi,nisn')],
                'no_telp' => ['nullable', 'numeric', 'digits_between:5,13'],
                'agama' => ['nullable', 'string'],
                'tmp_lahir' => ['nullable', 'string'],
                'tgl_lahir' => ['nullable', 'date'],
                'jenis_kelamin' => ['nullable', 'string'],
                'jurusan' => ['nullable', 'numeric'],
                'tamatan' => ['nullable', 'string'],
            ];
        } else {
            $alumni = Pribadi::where('id_user', $this->id)->first();
            return [
                'nisn' => ['nullable', 'numeric', 'digits_between:5,11', ($alumni->nisn == $this->nisn ? '' : 'unique:data_pribadi,nisn')],
                'no_telp' => ['nullable', 'numeric', 'digits_between:5,13'],
                'agama' => ['nullable', 'string'],
                'tmp_lahir' => ['nullable', 'string'],
                'tgl_lahir' => ['nullable', 'date'],
                'jenis_kelamin' => ['nullable', 'string'],
                'jurusan' => ['nullable', 'numeric'],
                'tamatan' => ['nullable', 'string'],
            ];
        }
    }

    public function messages()
    {
        return [
            'nisn.numeric' => 'NISN harus berupa angka',
            'nisn.digits_between' => 'NISN harus memiliki panjang antara 5 sampai 11 digit.',
            'nisn.unique' => 'NISN telah dimiliki oleh alumni lainnya',
            'no_telp.numeric' => 'No Telp harus berupa angka',
            'no_telp.digits_between' => 'No Telp harus memiliki panjang antara 5 sampai 11 digit.',
            'tgl_lahir.date' => 'Tanggal Lahir harus dalam format tanggal',
            'jurusan.numeric' => 'Harap isi dengan benar!'
        ];
    }
}
