<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Modul;
use App\Models\Matkul;

class ModulRequest extends FormRequest
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
            'matkul_id' => 'required|exists:matkuls,id',
        ];

        // Jika method POST (create), file wajib
        if ($this->method() === 'POST') {
            $rules['img'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
            $rules['file'] = 'required|file|mimes:pdf,doc,docx|max:10240';
        } else {
            // Jika method PUT (update), file tidak wajib
            $rules['img'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
            $rules['file'] = 'nullable|file|mimes:pdf,doc,docx|max:10240';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama modul tidak boleh kosong!',
            'name.max' => 'Nama modul maksimal 100 karakter!',
            'matkul_id.required' => 'Mata kuliah harus dipilih!',
            'matkul_id.exists' => 'Mata kuliah yang dipilih tidak valid!',
            'img.required' => 'Gambar harus diupload!',
            'img.image' => 'Gambar harus berupa file gambar!',
            'img.mimes' => 'Gambar harus berupa JPG, PNG, atau JPEG!',
            'img.max' => 'Gambar maksimal 2MB!',
            'file.required' => 'File modul harus diupload!',
            'file.mimes' => 'File modul harus berupa PDF, DOC, atau DOCX!',
            'file.max' => 'File modul maksimal 10MB!',
        ];
    }
}
