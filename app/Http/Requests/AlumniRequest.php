<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Alumni;

class AlumniRequest extends FormRequest
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
        $db = new Alumni();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'class_year' => 'required|max_digits:values:4',
            'graduation_year' => 'required|max_digits:values:4',
            'work' => 'required|max:100',
            'company' => 'required|max:100',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong!',
            'name.max' => 'Nama maksimal 100 karakter!',
            'class_year.required' => 'Tahun Masuk tidak boleh kosong!',
            'class_year.max' => 'Tahun Masuk maksimal 4 karakter!',
            'graduation_year.required' => 'Tahun Lulus tidak boleh kosong!',
            'graduation_year.max' => 'Tahun Lulus maksimal 4 karakter!',
            'work.required' => 'Pekerjaan tidak boleh kosong!',
            'work.max' => 'Pekerjaan maksimal 100 karakter!',
            'company.required' => 'Perusahaan tidak boleh kosong!',
            'company.max' => 'Perusahaan maksimal 100 karakter!',
            'img.image' => 'Gambar harus berupa gambar!',
            'img.mimes' => 'Gambar harus berupa jpeg, png, jpg, gif, svg!',
            'img.max' => 'Gambar maksimal 5mb!',
        ];
    }
}
