<?php

namespace App\Http\Controllers\bendahara;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class bendaharaController extends Controller
{
    public function bendahara(){
        return view('bendahara.dashboard-bendahara');

    }

    public function save(){
        return view('bendahara.save-money');
    }

    public function detail(){
        return view('bendahara.detail-info');
    }
}
