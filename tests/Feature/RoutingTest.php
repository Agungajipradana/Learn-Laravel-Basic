<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * Test for a GET request to '/learn'.
     * It checks if the request returns a 200 status code
     * and verifies that the response contains the text "Learn Laravel Basic".
     */
    public function testGet()
    {
        $this->get('/learn') // Send a GET request to '/learn'
            ->assertStatus(200) // Ensure the response status is 200 (OK)
            ->assertSeeText('Learn Laravel Basic'); // Verify the expected text is in the response
    }

    /**
     * Test for route redirection.
     * It ensures that accessing '/youtube' redirects to '/learn'.
     */
    public function testRedirect()
    {
        $this->get('/youtube') // Send a GET request to '/youtube'
            ->assertRedirect('/learn'); // Verify that the request is redirected to '/learn'
    }

    /**
     * Test for the fallback route.
     * It checks if accessing an undefined route returns "404 Not Found".
     */
    public function testFallback()
    {
        $this->get('/notfound') // Send a GET request to '/notfound'
            ->assertSeeText('404 Not Found'); // Check if the response contains "404 Not Found"

        $this->get('/notfounds') // Another undefined route
            ->assertSeeText('404 Not Found');

        $this->get('/undefined') // Another undefined route
            ->assertSeeText('404 Not Found');
    }
}
