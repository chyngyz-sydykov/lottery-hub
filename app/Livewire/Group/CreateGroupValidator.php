<?php

namespace App\Livewire\Group;

use App\Livewire\Group\Form\GroupForm;
use Illuminate\View\View;
use Livewire\Component;

class CreateGroupValidator extends Component
{
    public GroupForm $groupForm;

    public function validateInputs(): void
    {
        $validated = $this->validate();
        $this->dispatch('showConfirmation', ['group' => $validated]);
    }
    public function render(): View
    {
        return view('livewire.group.create-group-validator');
    }
}
