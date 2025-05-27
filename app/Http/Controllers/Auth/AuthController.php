<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.authentikasi');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

         $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email Anda belum terdaftar.',
            ])->withInput();
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Password yang Anda masukan salah!',
            ])->withInput();
        }


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;

            session()->flash('success', 'Halo ' . Auth::user()->name . ', selamat datang kembali!');

            if ($role === 'admin') {
                return redirect()->route('dashboard-admin');
            } elseif ($role === 'bendahara') {
                return redirect()->route('dashboard-bendahara');
            } elseif ($role === 'user') {
                return redirect()->route('dashboard-user');
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Role tidak dikenali.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('success', 'Anda berhasil logout!');

        return redirect()->route('login');
    }
}
