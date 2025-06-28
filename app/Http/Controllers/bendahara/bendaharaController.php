<?php

namespace App\Http\Controllers\bendahara;

use App\Models\Bendahara\BendaharaModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function App\Helpers\path_view;

class bendaharaController extends Controller
{
    public function bendahara(){

        $Bendahara = BendaharaModel::all();
        $view = path_view('bendahara.dashboard-bendahara');
        return view($view, compact('Bendahara'));

    }

    public function save(){
        return view('bendahara.save-money');
    }

    public function detail(){
        return view('bendahara.detail-info');
    }
}
