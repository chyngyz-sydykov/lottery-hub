<?php

namespace App\View\Components\Shared;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoadingIcon extends Component
{
    public function __construct()
    {}

    public function render(): View
    {
        return view('components.shared.loading-icon');
    }
}
