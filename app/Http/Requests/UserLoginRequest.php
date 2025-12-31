<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:filter',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Você precisa inserir uma :attribute.',
            'password.min' => 'A :attribute precisa ter 8 digitos.',
            'email.required' => 'Você precisa inserir um endereço de :attribute.',
            'email.email' => 'O endereço de :attribute inserido não é válido.'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'e-mail',
            'password' => 'senha'
        ];
    }
}
