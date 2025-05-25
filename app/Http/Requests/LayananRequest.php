<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayananRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'link' => 'nullable|max:100',
            'linkType' => 'required|max:100',
            'type' => 'required|max:100',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Layanan tidak boleh kosong!',
            'name.max' => 'Nama Layanan maksimal 100 karakter!',
            'file.mimes' => 'File Layanan harus berupa PDF, DOC, atau DOCX!',
            'file.max' => 'File Layanan maksimal 10MB!',
            'link.required' => 'Link Layanan tidak boleh kosong!',
            'link.max' => 'Link Layanan maksimal 100 karakter!',
            'linkType.required' => 'Tipe Link Layanan tidak boleh kosong!',
            'linkType.max' => 'Tipe Link Layanan maksimal 100 karakter!',
            'type.required' => 'Tipe Layanan tidak boleh kosong!',
            'type.max' => 'Tipe Layanan maksimal 100 karakter!',
        ];
    }
}
