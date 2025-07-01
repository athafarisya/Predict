<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolusiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'waktu_kelulusan' => 'required|string|max:255',
            'solusi' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'waktu_kelulusan.required' => 'Waktu kelulusan harus diisi.',
            'solusi.required' => 'Solusi harus diisi.',
        ];
    }
}
