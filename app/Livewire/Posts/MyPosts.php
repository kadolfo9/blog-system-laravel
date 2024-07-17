<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyPosts extends Component
{

    public $posts = [];

    public function mount()
    {
        $user = Auth::user();
        $userPosts = [];

        if ($user !== null) {
            $userPosts = Post::query()->where([
                'author' => $user->getQueueableId()
            ])->get()->toArray();
        }

        $this->posts = $userPosts;
    }

    public function create_post()
    {
        return redirect('/createpost');
    }

    public function render()
    {
        return view('livewire.posts.my-posts', [
            'posts' => $this->posts
        ]);
    }
}
