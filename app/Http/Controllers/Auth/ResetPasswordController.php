<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResetPasswordController extends Controller
{
    public function Reset()
    {
        return view('auth.reset-password');
    }
}
