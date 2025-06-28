<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class bendaharaSidebar extends Component
{
    public $bendahara;
    public function __construct()
    {
        $this->bendahara = Auth::user();

        dd($this->bendahara);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-bendahara');
    }
}
