<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LabeledParagraph extends Component
{
    public function __construct(
        public string $label,
        public string $value = '',
    ) {}

    public function render(): View
    {
        return view('components.labeled-paragraph');
    }
}
