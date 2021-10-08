<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class PertanianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_perjanjian_sewa' => 'required',
            'nama_penyewa' => 'required',
            'lokasi' => 'required',
            'nominal' => 'required',
            'tanggal_sewa' => 'required',
            'status' => 'required',
            // 'keterangan' => 'required',
        ];
    }
}
