<?php

namespace App\Http\Controllers\User;

use App\Models\User\UserModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use function App\Helpers\path_view;

class UserController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        $divisi = $user->departemen;

        $view = path_view('user.dashboard-user');
        return view($view, compact('user', 'divisi'));
    }
}
