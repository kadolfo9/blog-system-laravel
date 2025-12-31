<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/login');
        }

        $data = $user->only(['name', 'email', 'created_at']);

        return view('dashboard.profile', ['user' => $data]);
    }
}
