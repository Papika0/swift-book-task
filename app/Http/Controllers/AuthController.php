<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Author;
use App\Models\Book;

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
        return view('dashboard', [
            'booksCount' => Book::count(),
            'authorsCount' => Author::count(),
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
