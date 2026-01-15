<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexLogin()
    {
        return view("auth.login");
    }

    public function indexRegister()
    {
        return view("auth.register");
    }

    /**
     * Show the form for creating a new resource.
     */

    public function login(Request $request)
{
    // 1. VALIDASI
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // 2. LOGIN ATTEMPT
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        // 3. REDIRECT JIKA BERHASIL
         return redirect()->route('admin.index');
    }

    // 4. JIKA GAGAL
    return back()->withErrors([
        'email' => 'Email atau password salah',
    ])->withInput();
}

    
    public function create(Request $request)
    {
       
      // 1. VALIDASI DATA
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed',
        ]);

        // 2. SIMPAN USER KE DATABASE
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. REDIRECT KE LOGIN
        return redirect()->route('auth.login')
            ->with('success', 'Register berhasil, silakan login!');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
