<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Layanan;

class LayananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $db = new Layanan();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100', 
            'desc' => 'required|max:1000', 
            'link' => 'required|max:100', 
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'user_id' => 'required',
        ];
    }
}
