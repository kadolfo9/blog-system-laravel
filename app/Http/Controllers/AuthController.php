<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function login(UserLoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->intended('/profile');
        }

        return back()->withErrors([
            'email' => 'Usuário ou senha inválidos.',
        ])->onlyInput('email');
    }

    public function register(UserRegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect('/profile');
    }
}
