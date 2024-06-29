<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('welcome', compact('user'));
    }
}
