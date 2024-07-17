<?php

use App\Livewire\Auth\UserLogin;
use App\Livewire\Auth\UserSignup;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\ViewPost;
use App\Livewire\Profile\MyProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', UserSignup::class);
Route::get('/login', UserLogin::class);

Route::get('/profile', MyProfile::class);

Route::get('/createpost', CreatePost::class);

Route::get('/posts/{id}', ViewPost::class);
