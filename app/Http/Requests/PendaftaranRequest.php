<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nama_panggilan' => ['nullable', 'string', 'max:255'],
            'nomor_hp' => ['nullable', 'string', 'max:50'],
            'asal_sekolah' => ['nullable', 'string', 'max:255'],
            'jurusan' => ['nullable', 'string', 'max:255'],
'program_studi' => ['nullable', 'string', 'max:255'],
            'angkatan' => ['nullable', 'string', 'max:10'],
            'bukti_file' => ['nullable', 'url', 'max:255'],
            'status' => ['nullable', 'string', 'max:50'],
        ];
    }
}
