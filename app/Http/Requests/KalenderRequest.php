<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KalenderRequest extends FormRequest
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
        return [
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'File tidak boleh kosong!',
            'file.mimes' => 'File harus berupa pdf, jpeg, png, jpg, gif, svg!',
            'file.max' => 'File maksimal 5mb!',
        ];
    }
}
