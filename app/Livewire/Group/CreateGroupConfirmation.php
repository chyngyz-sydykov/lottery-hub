<?php

namespace App\Livewire\Group;

use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use Illuminate\View\View;
use Livewire\Component;

class CreateGroupConfirmation extends Component
{
    protected $listeners = ['showConfirmation' => 'show'];

    public bool $visible = false;

    public array $group = [];

    public function show(array $params): void
    {
        if (isset($params['group'])) {
            $this->group = $params['group'];
        }
        $this->visible = true;
    }

    public function hide(): void
    {
        $this->visible = false;
    }

    public function save(): void
    {
        if ($this->group) {
            $rules = $this->getValidationRules();

            $validated = $this->validate($rules);

            Group::create($validated['group']);
            session()->flash('success', __('Group created successfully.'));

            redirect()->to(route('groups.index'));
        } else {
            session()->flash('error', __('Could not save group. Please try again.'));
        }
    }

    public function render(): View
    {
        return view('livewire.group.create-group-confirmation', [
            'group' => $this->group,
        ]);
    }

    private function getValidationRules(): array
    {
        $tempRules = StoreGroupRequest::getRules();
        $rules = [];
        foreach ($tempRules as $key => $value) {
            $rules['group.'.$key] = $value;
        }

        return $rules;
    }
}
