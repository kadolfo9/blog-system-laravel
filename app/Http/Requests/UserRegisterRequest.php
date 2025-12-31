<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Você precisa inserir um :attribute.',
            'name.min' => 'O :attribute precisa ter 2 digitos.',
            'password.required' => 'Você precisa inserir uma :attribute.',
            'password.min' => 'A :attribute precisa ter 8 digitos.',
            'email.required' => 'Você precisa inserir um endereço de :attribute.',
            'email.email' => 'O :attribute precisa ser um email.',
            'email.valid' => 'O :attribute precisa ser um email valido.',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'senha',
            'email' => 'e-mail',
            'name' => 'nome',
        ];
    }
}
