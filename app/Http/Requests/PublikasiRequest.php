<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Publikasi;

class PublikasiRequest extends FormRequest
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
        $db = new Publikasi();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'title' => 'required|max:100',
            'type' => 'required|max:100',
            'publisher' => 'required|max:100',
            'year' => 'required|max:100',
            'link' => 'required|max:100',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul tidak boleh kosong!',
            'title.max' => 'Judul maksimal 100 karakter!',
            'type.required' => 'Tipe tidak boleh kosong!',
            'type.max' => 'Tipe maksimal 100 karakter!',
            'publisher.required' => 'Penerbit tidak boleh kosong!',
            'publisher.max' => 'Penerbit maksimal 100 karakter!',
            'year.required' => 'Tahun tidak boleh kosong!',
            'year.max' => 'Tahun maksimal 100 karakter!',
            'link.required' => 'Link tidak boleh kosong!',
            'link.max' => 'Link maksimal 100 karakter!',
            'description.required' => 'Deskripsi tidak boleh kosong!',
            'description.max' => 'Deskripsi maksimal 255 karakter!',
        ];
    }
}
