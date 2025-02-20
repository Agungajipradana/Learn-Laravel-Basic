<?php

namespace Tests\Feature; // Defines the namespace for this test class, categorizing it as a Feature test.

use Illuminate\Foundation\Testing\RefreshDatabase; // Trait for refreshing the database between tests (not used in this test but useful for database-related tests).
use Illuminate\Foundation\Testing\WithFaker; // Trait for generating fake data in tests (not used in this test).
use Tests\TestCase; // Base test class provided by Laravel, which all test cases should extend.

class ConfigurationTest extends TestCase
{
    /**
     * Test retrieving values from the configuration file.
     */
    public function testConfig()
    {
        // Retrieve values from the 'contoh' configuration file
        $firstName = config('contoh.author.first'); // Fetches 'contoh.author.first' value from config/contoh.php
        $lastName = config('contoh.author.last');   // Fetches 'contoh.author.last' value from config/contoh.php
        $email = config('contoh.email');           // Fetches 'contoh.email' value from config/contoh.php
        $web = config('contoh.web');               // Fetches 'contoh.web' value from config/contoh.php

        // Assert that the retrieved values match the expected default values from config/contoh.php
        self::assertEquals('Jhon', $firstName); 
        self::assertEquals('Doe', $lastName);
        self::assertEquals('jhon.doe@gmail.com', $email);
        self::assertEquals('https://www.learnlaravelbasic.com', $web);
    }
}
