<?php

namespace Tests\Feature\Pages\Groups;

use App\Models\Group;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ShowPageTest extends TestCase
{
    public function test_group_show_page_displays_correct_content(): void
    {
        $group = Group::factory()->create([
            'name' => 'Test_Group_Name',
            'description' => 'Test Group Description',
            'participant_limit' => 10,
            'prize_pool' => 1000,
            'price' => 100,
            'status' => 'public',
            'finishing_date' => Carbon::now()->addDays(10),
        ]);

        $response = $this->get(route('groups.show', ['group' => $group->id]));

        $response->assertStatus(Response::HTTP_OK);

        $response->assertSeeInOrder([
            'Filters',
            'Group Details',
            'Group Name',
            $group->name,
            'Finishing Date',
            $group->finishing_date->format('d/m/Y'),
            'Participant Limit',
            '0 / '.$group->participant_limit,
            'Prize Pool',
            $group->prize_pool,
            'Ticket Price',
            $group->price,
            'Status',
            $group->status,
            'Description',
            $group->description,
            'Back',
        ]);
    }
}
