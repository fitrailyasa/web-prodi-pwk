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
            'vision' => 'required',
            'mission' => 'required',
            'goals' => 'required',
            'total_lecture' => 'required',
            'total_student' => 'required',
            'total_teaching_staff' => 'required',
            'address' => 'nullable|max:100',
            'phone' => 'nullable|max:100',
            'email' => 'nullable|max:100',
            'description' => 'nullable|max:1000',
            'instagram_url' => 'nullable|max:100',
            'youtube_url' => 'nullable|max:100',
            'tiktok_url' => 'nullable|max:100',
            'latitude' => 'nullable|max:100',
            'longitude' => 'nullable|max:100',
            'maps_url' => 'nullable|max:100',
            'semester' => 'required|max:100',
            'year' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul maksimal 100 karakter!',
        ];
    }
}
