<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
