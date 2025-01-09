<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Modul;

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
        $db = new Modul();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'category' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul maksimal 100 karakter!',
            'file.required' => 'Modul tidak boleh kosong!',
            'file.mimes' => 'Modul harus berupa pdf, jpeg, png, jpg, gif, svg!',
            'file.max' => 'Modul maksimal 5mb!',
            'img.image' => 'Gambar harus berupa gambar!',
            'img.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg!',
            'img.max' => 'Gambar maksimal 5mb!',
            'category.required' => 'Kategori tidak boleh kosong!',
            'category.max' => 'Kategori maksimal 100 karakter!',
        ];
    }
}
