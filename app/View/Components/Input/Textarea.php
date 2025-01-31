<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public function __construct(
        public string $label,
        public string $name,
        public string $placeholder = '',
        public ?string $value = '',
        public bool $required = false
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.textarea');
    }
}
