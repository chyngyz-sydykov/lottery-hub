<?php

namespace Tests\Feature\Livewire\Groups;

use App\Livewire\Group\CreateGroupConfirmation;
use App\Models\Group;
use Carbon\Carbon;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CreateGroupConfirmationTest extends TestCase
{
    protected function tearDown(): void
    {
        Group::where('name', 'Test Group')->delete();
        parent::tearDown();
    }
    public function test_livewire_component_saves_valid_data_to_db_and_redirects_to_group_index_page(): void
    {
        $afterMonth = Carbon::now()->addMonth();
        $validData = [
            'group' => [
                'name' => 'Test Group',
                'participant_limit' => '10',
                'prize_pool' => '100',
                'price' => '100',
                'status' => 'public',
                'finishing_date' => $afterMonth,
                'description' => '',
            ],
        ];

        Livewire::test(CreateGroupConfirmation::class)
            ->fill($validData)
            ->call('save')
            ->assertRedirect(route('groups.index'));

        $this->assertDatabaseHas('groups', [
            'name' => 'Test Group',
            'participant_limit' => 10,
            'prize_pool' => 100,
            'price' => 100,
            'status' => 'public',
            'finishing_date' => $afterMonth,
            'description' => '',
        ]);
    }

    #[DataProvider('invalidGroupDataProvider')]
    public function test_displays_validation_error_when_submitting_invalid_data(array $invalidData, array $expectedErrors): void
    {
        Livewire::test(CreateGroupConfirmation::class)
            ->fill($invalidData)
            ->call('save')
            ->assertHasErrors($expectedErrors);
    }

    public static function invalidGroupDataProvider(): array
    {
        return [
            'empty data' => [
                [
                    'group' => [
                        'name' => '',
                        'participant_limit' => '',
                        'prize_pool' => '',
                        'price' => '',
                        'status' => '',
                        'finishing_date' => '',
                        'description' => '',
                    ],
                ],
                ['group.name', 'group.participant_limit', 'group.prize_pool', 'group.price', 'group.status', 'group.finishing_date'],
            ],
            'invalid participant limit' => [
                [
                    'group' => [
                        'name' => 'Test Group',
                        'participant_limit' => 'invalid',
                        'prize_pool' => '100',
                        'price' => '100',
                        'status' => 'public',
                        'finishing_date' => '2023-12-31',
                        'description' => '',
                    ],
                ],
                ['group.participant_limit'],
            ],
            'invalid prize pool' => [
                [
                    'group' => [
                        'name' => 'Test Group',
                        'participant_limit' => '10',
                        'prize_pool' => 'invalid',
                        'price' => '100',
                        'status' => 'public',
                        'finishing_date' => '2023-12-31',
                        'description' => '',
                    ],
                ],
                ['group.prize_pool'],
            ],
            'invalid price' => [
                [
                    'group' => [
                        'name' => 'Test Group',
                        'participant_limit' => '10',
                        'prize_pool' => '100',
                        'price' => 'invalid',
                        'status' => 'public',
                        'finishing_date' => '2023-12-31',
                        'description' => '',
                    ],
                ],
                ['group.price'],
            ],
            'invalid status' => [
                [
                    'group' => [
                        'name' => 'Test Group',
                        'participant_limit' => '10',
                        'prize_pool' => '100',
                        'price' => '100',
                        'status' => 'invalid',
                        'finishing_date' => '2023-12-31',
                        'description' => '',
                    ],
                ],
                ['group.status'],
            ],
            'past finishing date' => [
                [
                    'group' => [
                        'name' => 'Test Group',
                        'participant_limit' => '10',
                        'prize_pool' => '100',
                        'price' => '100',
                        'status' => 'public',
                        'finishing_date' => Carbon::now()->addDays(-30),
                        'description' => '',
                    ],
                ],
                ['group.finishing_date'],
            ],
        ];
    }
}
