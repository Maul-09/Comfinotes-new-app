<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VerifEmailController extends Controller
{
    public function Verif()
    {
        return view('auth.verifikasi-email');
    }
}
