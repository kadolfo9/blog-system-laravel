<?php

namespace App\Livewire\Auth\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserLoginForm extends Form
{

    #[Validate]
    public string $email = '';

    #[Validate]
    public string $password = '';

    public function rules()
    {
        return [
            'email' => 'required|email:filter',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Você precisa inserir uma :attribute.',
            'password.min' => 'A :attribute precisa ter 8 digitos.',
            'email.required' => 'Você precisa inserir um endereço de :attribute.',
        ];
    }

    public function validationAttributes()
    {
        return [
            'password' => 'senha',
            'email' => 'e-mail',
        ];
    }

    public function store()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            request()->session()->regenerate();

            return redirect('/profile');
        }

        return back()->withErrors([
            'email' => 'As credenciais não concidem.',
        ])->onlyInput('email');
    }
}
