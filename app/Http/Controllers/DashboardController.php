<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/login');
        }

        $data = $user->only(['name', 'email', 'created_at']);

        $posts = Post::where('author', $user->id)
            ->get();

        return view('dashboard.profile', [
            'user' => $data,
            'posts' => $posts,
            'showPosts' => false
        ]);
    }
}
