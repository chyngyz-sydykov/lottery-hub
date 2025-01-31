<?php

namespace Tests\Feature\Pages\Groups;

use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    use RefreshDatabase;
    public function test_page_displays_correct_content_with_default_sorting_order(): void
    {
        Group::factory(20)->create();

        $response = $this->get(route('groups.index'));

        $groups = Group::orderBy('prize_pool', 'desc')->take(2)->get();
        $firstGroup = $groups->first();
        $secondGroup = $groups->last();


        $response->assertStatus(Response::HTTP_OK);

        $response->assertSeeInOrder([
            'Filters',
            'Group Listings',
            //Sort options
            'Finishing Soon',
            'Biggest Prize Pool',
            'Biggest Participants',
            'Open',
            'Price Ascending',
            'Price Descending',
            'Create Group',

            //first group sorted by prize pool desc as a default
            $firstGroup->name,
            'Participants',
            $firstGroup->participant_limit,
            'Finish Date',
            Carbon::parse($firstGroup->finishing_date)->format('d/m/Y'),
            'Prize Pool',
            $firstGroup->prize_pool,
            'Price',
            $firstGroup->price,
            'Status',
            $firstGroup->status,
            //second group sorted by prize pool desc as a default
            $secondGroup->name,
            $secondGroup->participant_limit,
            Carbon::parse($secondGroup->finishing_date)->format('d/m/Y'),
            $secondGroup->prize_pool,
            $secondGroup->price,
            $secondGroup->status,

        ]);
    }
    public function test_page_sorts_groups_correctly(): void
    {
        Group::factory()->create(['name' => 'Group A', 'prize_pool' => 100, 'participant_limit' => 5, 'price' => 50, 'status' => 'open', 'finishing_date' => now()->addDays(10)]);
        Group::factory()->create(['name' => 'Group B', 'prize_pool' => 200, 'participant_limit' => 10, 'price' => 100, 'status' => 'open', 'finishing_date' => now()->addDays(5)]);

        $sortOptions = [
            'finishing_soon' => ['finishing_date', 'asc'],
            'biggest_prize_pool' => ['prize_pool', 'desc'],
            'biggest_participants' => ['participant_limit', 'desc'],
            'open' => ['status', 'asc'],
            'asc_price' => ['price', 'asc'],
            'desc_price' => ['price', 'desc'],
        ];

        foreach ($sortOptions as $sort => $options) {
            $response = $this->get(route('groups.index', ['sort' => $sort]));

            $response->assertStatus(Response::HTTP_OK);

            $groups = $response->viewData('groups');

            $sortedGroups = Group::orderBy($options[0], $options[1])->get();
            $this->assertEquals($sortedGroups->pluck('id')->toArray(), $groups->pluck('id')->toArray());
        }
    }

    public function test_page_return_bad_request_error_when_sort_parameter_not_within_allowed_list(): void
    {
        $response = $this->get(route('groups.index', ['sort' => 'invalid_sort']));

        $response->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}
