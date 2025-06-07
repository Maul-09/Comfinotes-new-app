<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class BendaharaLayout extends Component
{
    public string $PageTitle;
    public string $PageSubtitle;

    public function __construct(string $PageTitle = 'Default Title', string $PageSubtitle = 'Default Subtitle')
    {
        $this->PageTitle = $PageTitle;
        $this->PageSubtitle = $PageSubtitle;
    }

    public function render(): View|Closure|string
    {
        return view('components.bendahara-layout', [
            'PageTitle' => $this->PageTitle,
            'PageSubtitle' => $this->PageSubtitle,
        ]);
    }
}
