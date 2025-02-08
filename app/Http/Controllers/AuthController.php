<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function Auth()
    {
        return view('auth.authentikasi');
    }

    public function Forgot()
    {
        return view('auth.forgot-password');
    }

    public function Verif()
    {
        return view('auth.verifikasi-email');
    }

    public function Reset()
    {
        return view('auth.reset-password');
    }
}
