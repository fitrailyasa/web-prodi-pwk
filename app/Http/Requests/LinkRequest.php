<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Link;

class LinkRequest extends FormRequest
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
        $db = new Link();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'desc' => 'required|max:1000',
            'link' => 'required|max:100',
            'category' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul maksimal 100 karakter!',
            'desc.required' => 'Deskripsi tidak boleh kosong!',
            'desc.max' => 'Deskripsi maksimal 1000 karakter!',
            'link.required' => 'Link tidak boleh kosong!',
            'link.max' => 'Link maksimal 100 karakter!',
            'category.required' => 'Kategori tidak boleh kosong!',
            'category.max' => 'Kategori maksimal 100 karakter!',
        ];
    }
}
