<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\UserSignupForm;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Blog - Cadastro')]
class UserSignup extends Component
{
    public UserSignupForm $form;

    public function save()
    {
        $this->form->store();

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.user-signup');
    }
}
