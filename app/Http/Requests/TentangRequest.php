<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tentang;

class TentangRequest extends FormRequest
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
        $db = new Tentang();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'desc' => 'required|max:1000',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul maksimal 100 karakter!',
            'desc.required' => 'Deskripsi tidak boleh kosong!',
            'desc.max' => 'Deskripsi maksimal 1000 karakter!',
            'img.image' => 'Gambar harus berupa gambar!',
            'img.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg!',
            'img.max' => 'Gambar maksimal 2mb!',
        ];
    }
}
