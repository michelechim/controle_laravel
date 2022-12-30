<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required | exists:users',
            'password' => 'required | string'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O email é obrigatório!',
            'email.exists' => 'Email não cadastrado!',
            'password.required' => 'A senha é obrigatório!'
        ];
    }
}
