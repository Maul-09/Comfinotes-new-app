<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function Admin()
    {
        return view('admin.dashboard-admin');
    }

    public function Comunnity(){
        return view('admin.comunnity');
    }
}
