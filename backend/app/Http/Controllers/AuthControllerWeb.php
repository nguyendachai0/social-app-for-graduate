<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControllerWeb extends Controller
{
    public function showRegisterView()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate session ID to prevent fixation
            return redirect()->route('home');
        }
        return redirect()->route('home');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function showLoginView()
    {
        return view('auth.login');
    }
}
