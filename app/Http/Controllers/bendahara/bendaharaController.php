<?php

namespace App\Http\Controllers\bendahara;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class bendaharaController extends Controller
{
    public function Bendahara(){
        return view('bendahara.dashboard-bendahara');

    }

    public function detail(){
        return view('bendahara.detail-info');
    }
}
