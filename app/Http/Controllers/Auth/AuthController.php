<?php

namespace App\Http\Controllers\Auth;

// Gunakan backslash di depan App untuk memaksa PHP mencari dari root
class AuthController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return view('frontend.auth.login');
    }
}