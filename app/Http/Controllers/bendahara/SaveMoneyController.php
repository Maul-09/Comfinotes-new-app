<?php

namespace App\Http\Controllers\bendahara;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SaveMoneyController extends Controller
{
    public function money() {
        return view('bendahara.save-money');
    }
}
