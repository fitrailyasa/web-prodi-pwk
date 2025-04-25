<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mbkm;

class MbkmRequest extends FormRequest
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
        $db = new Mbkm();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'benefits' => 'required|string',
            'link' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul tidak boleh kosong!',
            'title.max' => 'Judul maksimal 100 karakter!',
            'description.required' => 'Deskripsi tidak boleh kosong!',
            'description.max' => 'Deskripsi maksimal 1000 karakter!',
            'benefits.required' => 'Benefit tidak boleh kosong!',
            'benefits.string' => 'Benefit harus berupa string!',
            'link.required' => 'Link tidak boleh kosong!',
            'link.max' => 'Link maksimal 100 karakter!',
        ];
    }
}
