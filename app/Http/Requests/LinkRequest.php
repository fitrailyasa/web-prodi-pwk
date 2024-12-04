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
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|max:100',
        ];
    }
}
