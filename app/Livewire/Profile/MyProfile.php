<?php

namespace App\Livewire\Profile;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Blog - Seu Perfil')]
class MyProfile extends Component
{
    public $name;
    public $email;

    public $showPosts = false;

    public function mount()
    {
        $user = Auth::user();

        if ($user == null) {
            redirect()->to('login');
            return;
        }

        $this->name = $user['name'];
        $this->email = $user['email'];

        $this->showPosts = false;
    }

    public function logout()
    {
        $this->js("alert('saindo.')");
        Auth::logout();

        redirect('/', RedirectResponse::HTTP_OK);
    }

    public function render_posts()
    {
        # $this->dispatch('show_posts');
        $this->showPosts = !$this->showPosts;
    }


    public function render()
    {
        return view('livewire.profile.my-profile', [
            'showPosts' => $this->showPosts
        ]);
    }
}
