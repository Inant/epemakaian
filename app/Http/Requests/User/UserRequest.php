<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $ignoreUsername = request()->username ?? null;
        $ignoreEmail = request()->email ?? null;

        return [
            'nama' => 'required|string|max:255',
            'username' => 'required|max:20|unique:users,username,'.$ignoreUsername,
            'email' => 'required|email|max:255|unique:users,email,'.$ignoreEmail,
            'password' => 'nullable|string|min:8|max:255|confirmed',
            'hak_akses' => 'required|string|in:admin,petugas'
        ];
    }
}
