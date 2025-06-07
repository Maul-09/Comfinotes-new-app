<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     */

    public string $PageTitle;
    public string $PageSubtitle;
    public function __construct(string $PageTitle = 'Default Title', string $PageSubtitle = 'Default Title')
    {
        $this->PageTitle = $PageTitle;
        $this->PageSubtitle = $PageSubtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-layout', [
            'PageTitle' => $this->PageTitle,
            'PageSubtitle' => $this->PageSubtitle
        ]);
    }
}
