<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StrukturRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'periode' => ['nullable', 'string', 'max:50'],
            'jabatan' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'divisi' => ['nullable', 'string', 'max:255'],
            'level' => ['required', 'integer', 'between:1,5'],
            'icon' => ['nullable', 'string', 'max:255'],
            'urutan' => ['nullable', 'integer'],
        ];
    }
}
