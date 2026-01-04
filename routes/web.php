<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login.request');

    Route::get('/register', 'registerIndex')->name('register');
    Route::post('/register', 'register')->name('register.request');
});

Route::controller(PostController::class)
    ->middleware('auth')
    ->group(function () {
    Route::get('/posts', 'index')->name('posts');
    Route::post('/posts', 'store')->name('posts.store');

    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
});

Route::controller(DashboardController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/profile', 'index')->name('profile');
});
