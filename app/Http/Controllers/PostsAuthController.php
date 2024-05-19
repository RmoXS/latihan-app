<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsAuthController extends Controller
{
    public function showLoginForm()
    {
        return view("posts.auth.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credentials = $request->only("email", "password");
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route("posts.index");
        }

        return redirect()->route("posts.login")->withErrors(["email" => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('posts.login');
    }
}