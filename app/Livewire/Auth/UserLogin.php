<?php

namespace App\Livewire\Auth;

use App\Livewire\Auth\Forms\UserLoginForm;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\Title;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

#[Title('Blog - Login')]
class UserLogin extends Component
{
    public UserLoginForm $form;

    public function save()
    {
        $formStore = $this->form->store();

        if ($formStore instanceof RedirectResponse) {
            if ($formStore->getStatusCode() !== Response::HTTP_OK) {
                $this->dispatch('user-error');
            }
        }
    }

    public function signup()
    {
        redirect('signup', RedirectResponse::HTTP_OK);
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}
