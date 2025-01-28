<?php

namespace Tests\Feature\Pages\Groups;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    public function test_group_index_page_displays_correct_content(): void
    {
        $response = $this->get(route('groups.index'));

        $response->assertStatus(Response::HTTP_OK);

        $response->assertSeeInOrder([
            'Filters',
            'Group Listings',
        ]);
    }
}
