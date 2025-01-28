<?php

namespace Tests\Feature\Pages;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_page_displays_correct_content(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(Response::HTTP_OK);

        $response->assertSeeInOrder([
            'Cash Pool',
            'Experience the thrill of lottery with fair rules and amazing prizes!',
            'Why Choose Us',
            'Play',
            'Earn',
            'Get Money',
            'How to Top Up Balance',
            'Our Achievements',
            'What Our Users Say',
            'FAQs',
        ]);
    }
}
