<?php

namespace Tests\Feature; // Defines the namespace for this test class, placing it in the Feature tests category.

use Illuminate\Foundation\Testing\RefreshDatabase; // Trait for refreshing the database between tests (not used in this test but useful for database-related tests).
use Illuminate\Foundation\Testing\WithFaker; // Trait for generating fake data in tests (also not used in this test).
use Tests\TestCase; // Base test class provided by Laravel, which all test cases should extend.

class ContohTest extends TestCase
{
    /**
     * A basic feature test example.
     * 
     * This test checks if the home route ('/') returns a successful response.
     */
    public function test_example(): void
    {
        // Send a GET request to the root URL ('/')
        $response = $this->get('/');

        // Assert that the response status code is 200 (OK)
        $response->assertStatus(200);
    }
}
