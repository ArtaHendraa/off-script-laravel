<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view("auth.login");
    }

    public function indexRegister()
    {
        return view("auth.register");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::attempt($credentials, $request->filled("remember"))) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === "user") {
                return redirect("/");
            } elseif (in_array($user->role, ["admin", "god"])) {
                return redirect("/admin");
            }
            return redirect("/");
        }

        return back()
            ->withErrors([
                "email" => "Email atau password salah",
            ])
            ->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:3|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return redirect()
            ->route("login")
            ->with("success", "Register berhasil, silakan login!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("login")->with("success", "Berhasil logout.");
    }
}
