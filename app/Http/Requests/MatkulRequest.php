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
            'code' => 'required|max:10',
            'credits' => 'required|max_digits:values:4',
            'lecture' => 'required|max:100',
            'credits' => 'required|max:6',
            'class' => 'required|max:100',
            'room' => 'required|max:100',
            'lecture' => 'required|max:100',
            'day' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mata kuliah tidak boleh kosong!',
            'name.max' => 'Mata kuliah maksimal 100 karakter!',
            'code.required' => 'Kode tidak boleh kosong!',
            'code.max' => 'Kode maksimal 10 karakter!',
            'credits.required' => 'SKS tidak boleh kosong!',
            'credits.max' => 'SKS maksimal 4 karakter!',
            'lecture.required' => 'Dosen tidak boleh kosong!',
            'lecture.max' => 'Dosen maksimal 100 karakter!',
            'day.required' => 'Hari tidak boleh kosong!',
            'day.in' => 'Hari harus Senin, Selasa, Rabu, Kamis, Jumat, Sabtu, Minggu!',
            'start_time.required' => 'Waktu tidak boleh kosong!',
            'start_time.date_format' => 'Format waktu harus HH:MM!',
            'end_time.required' => 'Waktu tidak boleh kosong!',
            'end_time.date_format' => 'Format waktu harus HH:MM!',
        ];
    }
}
