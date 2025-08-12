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

        $remember = $request->filled('remember');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email Anda belum terdaftar.',
            ])->withInput();
        }

        if (!$user || !Hash::check($credentials['password'], (string) $user->password)) {
            return back()->withErrors([
                'password' => 'Password yang Anda masukan salah!',
            ])->withInput();
        }

        if($user->role == 'user' && is_null($user->departemen_id)){
            return back()->withErrors([
                'email' => 'Akun Anda sudah tidak Aktif'
            ]);
        }

        if (Auth::attempt($credentials,  $remember)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;

            session()->flash('success', 'Halo ' . Auth::user()->username . ', selamat Bekerja!');

            return match ($role) {
                'admin' => redirect()->route('dashboard-admin'),
                'bendahara' => redirect()->route('dashboard-bendahara'),
                'user' => redirect()->route('dashboard-user'),
                default => back()->withErrors(['email' => 'Role tidak dikenali.']),
            };
        } else {

            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput();
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
