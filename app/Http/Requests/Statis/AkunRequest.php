<?php

namespace App\Http\Requests\Statis;

use Illuminate\Foundation\Http\FormRequest;

class AkunRequest extends FormRequest
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
            'kode' => 'required',
            'nama' => 'required'
        ];
    }
}
