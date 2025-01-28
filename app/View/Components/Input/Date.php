<?php

namespace App\View\Components\Input;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Date extends Component
{
    public function __construct(
        public string $label,
        public string $name,
        public string $value = '',
        public bool $required = false
    ) {}

    public function render(): View
    {
        return view('components.input.date');
    }
}
