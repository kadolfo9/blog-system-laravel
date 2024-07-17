<?php

namespace App\Livewire\Posts;

use App\Livewire\Posts\Forms\CreatePostForm;
use Livewire\Component;

class CreatePost extends Component
{
    public CreatePostForm $form;

    public function save()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.posts.create-post');
    }
}
