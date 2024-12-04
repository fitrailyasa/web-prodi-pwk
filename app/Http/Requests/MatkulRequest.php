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
            'desc' => 'required|max:1000',
            'credits' => 'required|max_digits:values:4',
            'lecture' => 'required|max:100',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jadwal_id' => 'required',
        ];
    }
}
