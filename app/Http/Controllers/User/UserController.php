<?php

namespace App\Http\Controllers\User;

use App\Models\User\UserModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function App\Helpers\path_view;

class UserController extends Controller
{
    public function user()
    {
        $view = path_view('user.dashboard-user');
        return view($view);
    }
}
