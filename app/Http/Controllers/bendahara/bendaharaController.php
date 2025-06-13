<?php

namespace App\Http\Controllers\bendahara;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function App\Helpers\path_view;

class bendaharaController extends Controller
{
    public function bendahara(){

        $view = path_view('bendahara.dashboard-bendahara');
        return view($view);

    }

    public function save(){
        return view('bendahara.save-money');
    }

    public function detail(){
        return view('bendahara.detail-info');
    }
}
