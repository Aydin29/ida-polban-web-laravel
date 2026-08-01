<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LowonganRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'perusahaan' => ['nullable', 'string', 'max:255'],
            'posisi' => ['required', 'string', 'max:255'],
            'lokasi' => ['nullable', 'string', 'max:255'],
            'kualifikasi' => ['nullable', 'string'],
            'deskripsi' => ['nullable', 'string'],
            'tipe' => ['nullable', 'string', 'max:100'],
            'badge' => ['nullable', 'string', 'max:100'],
            'tanggal_posting' => ['nullable', 'date'],
        ];
    }
}
