<?php

namespace App\View\Components\Input;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public function __construct(
        public string $label,
        public string $name,
        public ?string $value = '',
        public ?string $defaultValue = null,
        public ?array $emptyOption = null,
        public array $options = [],
        public bool $required = false
    ) {}

    public function render(): View
    {
        if (empty($this->value) && !empty($this->defaultValue)) {
            $this->value = $this->defaultValue;
        }

        return view('components.input.select');
    }
}
