<?php

namespace App\Livewire\Posts;

use App\Http\Controllers\PostController;
use Livewire\Attributes\Url;
use Livewire\Component;

class ViewPost extends Component
{
    #[Url]
    public $id;

    public string $title = '';
    public string $content = '';

    public $postController;

    public $post;

    public function boot()
    {
        $this->postController = new PostController();
    }

    public function mount()
    {
        $this->post = $this->postController->find($this->id);
    }


    public function rendering()
    {

    }

    public function render()
    {
        return view('livewire.posts.view-post', [
            'post' => $this->post,
        ]);
    }
}
