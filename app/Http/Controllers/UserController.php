<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $incomingFields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($incomingFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful');
        } else {
            return back()->with('error', 'Invalid login credentials.');

        }

    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function homePage(){
        return view('home');
    }
}
