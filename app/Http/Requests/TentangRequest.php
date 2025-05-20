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

        return [
            'name' => 'required|max:100',
            'vision' => 'nullable|max:1000',
            'mission' => 'nullable|max:1000',
            'goals' => 'nullable|max:1000',
            'total_lecture' => 'nullable|numeric',
            'total_student' => 'nullable|numeric',
            'total_teaching_staff' => 'nullable',
            'address' => 'nullable|max:100',
            'phone' => 'nullable|max:100',
            'email' => 'nullable|max:100',
            'description' => 'nullable|max:1000',
            'instagram_url' => 'nullable|max:100',
            'youtube_url' => 'nullable|max:100',
            'tiktok_url' => 'nullable|max:100',
            'semester' => 'nullable|max:100',
            'year' => 'nullable|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul maksimal 100 karakter!',
            'description.max' => 'Deskripsi maksimal 1000 karakter!',
            'vision.max' => 'Visi maksimal 1000 karakter!',
            'mission.max' => 'Misi maksimal 1000 karakter!',
            'goals.max' => 'Tujuan maksimal 1000 karakter!',
            'address.max' => 'Alamat maksimal 100 karakter!',
            'phone.max' => 'Nomor Telepon maksimal 100 karakter!',
            'email.max' => 'Email maksimal 100 karakter!',
            'instagram_url.max' => 'Instagram maksimal 100 karakter!',
            'youtube_url.max' => 'Youtube maksimal 100 karakter!',
            'tiktok_url.max' => 'Tiktok maksimal 100 karakter!',
            'semester.max' => 'Semester maksimal 100 karakter!',
            'year.max' => 'Tahun maksimal 100 karakter!',
        ];
    }
}
