<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPengujiController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-penguji');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Sementara redirect ke dashboard (dummy)
        return redirect()->route('dashboard.penguji');
    }
}