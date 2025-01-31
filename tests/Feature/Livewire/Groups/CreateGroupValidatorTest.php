<?php

namespace Feature\Livewire\Groups;

use App\Livewire\Group\CreateGroupValidator;
use Carbon\Carbon;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CreateGroupValidatorTest extends TestCase
{
    public function test_livewire_component_accepts_valid_data_and_shows_confirmation(): void
    {
        $afterMonth = Carbon::now()->addMonth();
        $validData = [
            'groupForm.name' => 'Test Group',
            'groupForm.participant_limit' => 10,
            'groupForm.prize_pool' => 1000,
            'groupForm.price' => 100,
            'groupForm.status' => 'public',
            'groupForm.finishing_date' => $afterMonth,
        ];

        // IMPORTANT: the order of the keys in the array is important
        $expectedData = [
            'name' => 'Test Group',
            'finishing_date' => $afterMonth->format('Y-m-d H:i:s'),
            'participant_limit' => 10,
            'prize_pool' => 1000,
            'price' => 100,
            'status' => 'public',
            'description' => null,
        ];

        Livewire::test(CreateGroupValidator::class)
            ->fill($validData)
            ->call('validateInputs')
            ->assertDispatched('showConfirmation', ['group' => $expectedData]);
    }

    #[DataProvider('invalidGroupDataProvider')]
    public function test_displays_validation_error_when_submitting_invalid_data(array $invalidData, array $expectedErrors): void
    {
        Livewire::test(CreateGroupValidator::class)
            ->fill($invalidData)
            ->call('validateInputs')
            ->assertHasErrors($expectedErrors);
    }

    public static function invalidGroupDataProvider(): array
    {
        return [
            'empty data' => [
                [
                    'groupForm.name' => '',
                    'groupForm.participant_limit' => '',
                    'groupForm.prize_pool' => '',
                    'groupForm.price' => '',
                    'groupForm.status' => '',
                    'groupForm.finishing_date' => '',
                ],
                ['groupForm.name', 'groupForm.participant_limit', 'groupForm.prize_pool', 'groupForm.price', 'groupForm.status', 'groupForm.finishing_date'],
            ],
            'invalid participant limit' => [
                [
                    'groupForm.name' => 'Test Group',
                    'groupForm.participant_limit' => 'invalid',
                    'groupForm.prize_pool' => '100',
                    'groupForm.price' => '100',
                    'groupForm.status' => 'public',
                    'groupForm.finishing_date' => '2023-12-31',
                ],
                ['groupForm.participant_limit'],
            ],
            'invalid prize pool' => [
                [
                    'groupForm.name' => 'Test Group',
                    'groupForm.participant_limit' => '10',
                    'groupForm.prize_pool' => 'invalid',
                    'groupForm.price' => '100',
                    'groupForm.status' => 'public',
                    'groupForm.finishing_date' => '2023-12-31',
                ],
                ['groupForm.prize_pool'],
            ],
            'invalid price' => [
                [
                    'groupForm.name' => 'Test Group',
                    'groupForm.participant_limit' => '10',
                    'groupForm.prize_pool' => '100',
                    'groupForm.price' => 'invalid',
                    'groupForm.status' => 'public',
                    'groupForm.finishing_date' => '2023-12-31',
                ],
                ['groupForm.price'],
            ],
            'invalid status' => [
                [
                    'groupForm.name' => 'Test Group',
                    'groupForm.participant_limit' => '10',
                    'groupForm.prize_pool' => '100',
                    'groupForm.price' => '100',
                    'groupForm.status' => 'invalid',
                    'groupForm.finishing_date' => '2023-12-31',
                ],
                ['groupForm.status'],
            ],
            'invalid finishing date' => [
                [
                    'groupForm.name' => 'Test Group',
                    'groupForm.participant_limit' => '10',
                    'groupForm.prize_pool' => '100',
                    'groupForm.price' => '100',
                    'groupForm.status' => 'public',
                    'groupForm.finishing_date' => 'invalid',
                ],
                ['groupForm.finishing_date'],
            ],
            'past finishing date' => [
                [
                    'groupForm.name' => 'Test Group',
                    'groupForm.participant_limit' => '10',
                    'groupForm.prize_pool' => '100',
                    'groupForm.price' => '100',
                    'groupForm.status' => 'public',
                    'groupForm.finishing_date' => Carbon::now()->addDays(-30),
                ],
                ['groupForm.finishing_date'],
            ],
        ];
    }
}
