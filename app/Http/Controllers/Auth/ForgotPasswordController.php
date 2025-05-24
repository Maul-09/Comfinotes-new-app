<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ForgotPasswordController extends Controller
{
    public function Forgot()
    {
        return view('auth.forgot-password');
    }
}

