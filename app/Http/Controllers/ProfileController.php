<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with("items")->latest()->get();
        return view("pages.profile.profile", compact("user", "orders"));
    }
}
