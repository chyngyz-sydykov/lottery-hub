<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    //use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Run the migrations
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed'); // If you want to seed the database
    }
}
