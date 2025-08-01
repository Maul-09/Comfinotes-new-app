<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SidebarAdmin extends Component
{
    public $admin;
    public function __construct()
    {

        $this->admin = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-admin', [
            'admin' => $this->admin
        ]);
    }
}
