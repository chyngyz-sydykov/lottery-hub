<?php

namespace Tests\Feature\Pages\Groups;

use Carbon\Carbon;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CreatePageTest extends TestCase
{
    public function test_group_create_page_displays_correct_content(): void
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

    #[DataProvider('invalidGroupDataProvider')]
    public function test_group_create_page_displays_validation_error_when_submitting_invalid_data(array $invalidData, array $expectedErrors): void
    {
        $response = $this->post(route('groups.store'), $invalidData);

        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHasErrors($expectedErrors);
    }

    #[\PHPUnit\Framework\Attributes\Group('salam')]
    public function test_group_create_page_successfully_submits_form_with_valid_data_and_redirects_to_group_create_page_with_success_flash_message(): void
    {
        $response = $this->post(route('groups.store'), [
            'name' => 'Test Group',
            'participant_limit' => 10,
            'prize_pool' => 1000,
            'price' => 100,
            'status' => 'public',
            'finishing_date' => Carbon::now()->addMonth()->format('d/m/Y'),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('groups.index'));
        $response->assertSessionHas('success', 'Group created successfully.');
    }

    public static function invalidGroupDataProvider(): array
    {
        return [
            'empty data' => [
                [
                    'name' => '',
                    'participant_limit' => '',
                    'prize_pool' => '',
                    'price' => '',
                    'status' => '',
                    'finishing_date' => '',
                ],
                ['name', 'participant_limit', 'prize_pool', 'price', 'status', 'finishing_date'],
            ],
            'invalid participant limit' => [
                [
                    'name' => 'Test Group',
                    'participant_limit' => 'invalid',
                    'prize_pool' => '100',
                    'price' => '100',
                    'status' => 'public',
                    'finishing_date' => '2023-12-31',
                ],
                ['participant_limit'],
            ],
            'invalid prize pool' => [
                [
                    'name' => 'Test Group',
                    'participant_limit' => '10',
                    'prize_pool' => 'invalid',
                    'price' => '100',
                    'status' => 'public',
                    'finishing_date' => '2023-12-31',
                ],
                ['prize_pool'],
            ],
            'invalid price' => [
                [
                    'name' => 'Test Group',
                    'participant_limit' => '10',
                    'prize_pool' => '100',
                    'price' => 'invalid',
                    'status' => 'public',
                    'finishing_date' => '2023-12-31',
                ],
                ['price'],
            ],
            'invalid status' => [
                [
                    'name' => 'Test Group',
                    'participant_limit' => '10',
                    'prize_pool' => '100',
                    'price' => '100',
                    'status' => 'invalid',
                    'finishing_date' => '2023-12-31',
                ],
                ['status'],
            ],
            'invalid finishing date' => [
                [
                    'name' => 'Test Group',
                    'participant_limit' => '10',
                    'prize_pool' => '100',
                    'price' => '100',
                    'status' => 'public',
                    'finishing_date' => 'invalid',
                ],
                ['finishing_date'],
            ],
        ];
    }
}
