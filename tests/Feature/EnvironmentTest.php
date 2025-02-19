<?php

namespace Tests\Feature; // Defines the namespace for this test class, categorizing it under Feature tests.

use Illuminate\Foundation\Testing\RefreshDatabase; // Trait for refreshing the database between tests (not used in this test but useful for database-related tests).
use Illuminate\Foundation\Testing\WithFaker; // Trait for generating fake data in tests (also not used in this test).
use Illuminate\Support\Env; // Laravel helper for retrieving environment variables.
use Tests\TestCase; // Base test class provided by Laravel, which all test cases should extend.

class EnvironmentTest extends TestCase
{
    /**
     * Test retrieving an environment variable using the env() helper function.
     */
    public function testGetEnv()
    {
        // Get the value of the 'YOUTUBE' environment variable from the .env file
        $youtube = env('YOUTUBE');

        // Assert that the 'YOUTUBE' environment variable is equal to 'Learn Laravel Basic'
        self::assertEquals('Learn Laravel Basic', $youtube);
    }

    /**
     * Test retrieving an environment variable with a default value.
     */
    public function testDefaultEnv()
    {
        // Get the value of the 'AUTHOR' environment variable, 
        // but use 'John' as the default if it is not set
        $author = Env::get('AUTHOR', 'John');

        // Assert that the value is 'John' (if 'AUTHOR' is not set in .env)
        self::assertEquals('John', $author);
    }
}
