<?php

namespace Tests\Feature\Pages\Groups;

use App\Livewire\Group\CreateGroupConfirmation;
use App\Livewire\Group\CreateGroupValidator;
use Carbon\Carbon;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CreatePageTest extends TestCase
{
    public function test_group_create_page_displays_fields_in_correct_order(): void
    {
        $response = $this->get(route('groups.create'));

        $response->assertStatus(Response::HTTP_OK);

        $response->assertSeeInOrder([
            'Filters',
            'Create a New Group',
            'Group Name',
            'Finishing Date',
            'Participant Limit',
            'Prize Pool',
            'Ticket Price',
            'Status',
            'Description',
        ]);
    }

    public function test_group_create_page_displays_livewire_components(): void
    {
        $this->get(route('groups.create'))
            ->assertSeeLivewire(CreateGroupValidator::class)
            ->assertSeeLivewire(CreateGroupConfirmation::class);
    }
}
