<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{

    public function find(string $id)
    {
        return Post::find($id);
    }

    public function show(string $id): View
    {
        return view('livewire.posts.view-post', [
            'post' => collect($this->find($id))->toArray(),
        ]);
    }
}
