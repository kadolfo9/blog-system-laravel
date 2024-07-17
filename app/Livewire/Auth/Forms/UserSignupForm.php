<?php

namespace App\Livewire\Auth\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserSignupForm extends Form
{

    #[Validate]
    public string $name = '';

    #[Validate]
    public string $email = '';

    #[Validate]
    public string $password = '';

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:users|email:filter',
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

    public function validationAttributes()
    {
        return [
            'password' => 'senha',
            'email' => 'e-mail',
            'name' => 'nome',
        ];
    }

    public function store(): void
    {
        $validated = $this->validate();

        User::factory()->create($validated);

        $this->reset();
    }
}
