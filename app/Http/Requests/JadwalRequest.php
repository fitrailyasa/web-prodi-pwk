<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Jadwal;

class JadwalRequest extends FormRequest
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
        $db = new Jadwal();
        $db->setDynamicConnection();

        // dd($db->getConnection()->getDatabaseName());

        return [
            'matkul_id' => 'required|exists:matkuls,id',
            'class' => 'required|string',
            'room' => 'required|string',
            'lecture' => 'required|integer',
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ];
    }
}
