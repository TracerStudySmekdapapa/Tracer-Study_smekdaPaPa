<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'nama' => ['required', 'min:3'],
            'email' => ['required', 'email:rcf,dns'],
            'subjek' => ['required', 'min:10'],
            'pesan' => ['required', 'min:10']
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama harus wajib diisi.',
            'nama.min' => 'Nama minimal 3 huruf.',
            'email.required' => 'Email harus wajib diisi.',
            'email.email' => 'Email harus sesuai format.',
            'subjek.required' => 'Subjek harus wajib diisi.',
            'subjek.min' => 'Subjek minimal 10 huruf.',
            'pesan.required' => 'Pesan harus wajib diisi.',
            'pesan.min' => 'Pesan minimal 10 huruf.'
        ];
    }
}
