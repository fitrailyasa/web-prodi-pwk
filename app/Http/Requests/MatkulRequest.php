<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Matkul;

class MatkulRequest extends FormRequest
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
        $db = new Matkul();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'code' => 'required|max:10',
            'credits' => 'required|max_digits:values:4',
            'lecture' => 'required|max:100',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jadwal' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mata kuliah tidak boleh kosong!',
            'name.max' => 'Mata kuliah maksimal 100 karakter!',
            'code.required' => 'Kode tidak boleh kosong!',
            'code.max' => 'Kode maksimal 10 karakter!',
            'credits.required' => 'SKS tidak boleh kosong!',
            'credits.max' => 'SKS maksimal 4 karakter!',
            'lecture.required' => 'Dosen tidak boleh kosong!',
            'lecture.max' => 'Dosen maksimal 100 karakter!',
            'img.image' => 'Gambar harus berupa gambar!',
            'img.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg!',
            'img.max' => 'Gambar maksimal 2mb!',
            'jadwal.required' => 'Jadwal tidak boleh kosong!',
        ];
    }
}
