<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function App\Helpers\path_view;

class UserController extends Controller
{
    public function user()
    {
        $view = path_view('admin.dashboard-admin');
        return view($view);
    }
}
