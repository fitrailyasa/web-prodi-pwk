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
        ];

        // Jika method POST (create), file wajib
        if ($this->method() === 'POST') {
            $rules['file'] = 'required|file|mimes:pdf,doc,docx|max:10240';
        } else {
            // Jika method PUT (update), file tidak wajib
            $rules['file'] = 'nullable|file|mimes:pdf,doc,docx|max:10240';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Layanan tidak boleh kosong!',
            'name.max' => 'Nama Layanan maksimal 100 karakter!',
            'file.required' => 'File Layanan harus diupload!',
            'file.mimes' => 'File Layanan harus berupa PDF, DOC, atau DOCX!',
            'file.max' => 'File Layanan maksimal 10MB!',
        ];
    }
}
