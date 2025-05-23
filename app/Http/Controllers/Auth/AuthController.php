<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function Login()
    {
        return view('auth.authentikasi');
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    protected function authenticated(Request $request, $user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');

            case 'bendahara':
                return redirect()->route('bendahara.dashboard');

            case 'user':
                return redirect()->route('user.dashboard');

            default:
                Auth::logout();
                abort(403, 'Role tidak dikenali.');
        }
    }

}
