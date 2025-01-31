<?php

namespace App\Livewire\Group\Form;

use App\Http\Requests\StoreGroupRequest;
use Livewire\Form;

class GroupForm extends Form
{
    public string $name;

    public string $finishing_date;

    public int|string $participant_limit;

    public float|string $prize_pool;

    public float|string $price;

    public string $status = 'public';

    public string $description;

    protected function rules(): array
    {
        return StoreGroupRequest::getRules();
    }
}
