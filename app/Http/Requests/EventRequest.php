<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Event;

class EventRequest extends FormRequest
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
        $db = new Event();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'name' => 'required|max:100',
            'desc' => 'required|max:1000',
            'status' => 'required',
            'event_date' => 'required|date',
            'publish_date' => 'required|date',
            'tag_id ' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul maksimal 100 karakter!',
            'desc.required' => 'Deskripsi tidak boleh kosong!',
            'desc.max' => 'Deskripsi maksimal 1000 karakter!',
            'status.required' => 'Status tidak boleh kosong!',
            'event_date.required' => 'Tanggal Event tidak boleh kosong!',
            'event_date.date' => 'Tanggal Event harus berupa tanggal!',
            'publish_date.required' => 'Tanggal Publish tidak boleh kosong!',
            'publish_date.date' => 'Tanggal Publish harus berupa tanggal!',
            'tag_id.required' => 'Tag tidak boleh kosong!',
            'tag_id.max' => 'Tag maksimal 100 karakter!',
        ];
    }
}
