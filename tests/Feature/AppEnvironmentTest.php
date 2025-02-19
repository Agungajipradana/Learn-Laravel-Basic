<?php

namespace Tests\Feature; // Defines the namespace for this test class, categorizing it as a Feature test.

use Illuminate\Foundation\Testing\RefreshDatabase; // Trait for refreshing the database between tests (not used in this test but useful for database-related tests).
use Illuminate\Foundation\Testing\WithFaker; // Trait for generating fake data in tests (not used in this test).
use Illuminate\Support\Facades\App; // Facade to access application environment settings.
use Tests\TestCase; // Base test class provided by Laravel, which all test cases should extend.

class AppEnvironmentTest extends TestCase
{
    /**
     * Test the current application environment.
     */
    public function testAppEnv()
    {
        // Check if the current application environment is 'testing', 'prod', or 'dev'
        if (App::environment(['testing', 'prod', 'dev'])) {
            // If the environment matches one of the specified values, assert true
            self::assertTrue(true);
        }
    }
}
