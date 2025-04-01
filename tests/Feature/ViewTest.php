<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    // This test checks the response and verifies the text shown in the view for the '/hello' route
    public function testView()
    {
        // Sending a GET request to the '/hello' route
        $this->get('/hello') // Make a GET request to the route '/hello'
            ->assertSeeText('Hello John'); // Verify if the response contains the text "Hello John"

        // Sending a GET request to the '/hello-john' route
        $this->get('/hello-john') // Make a GET request to the route '/hello-john'
            ->assertSeeText('Hello John'); // Verify if the response contains the text "Hello John"
    }

    // This test checks the response for a nested view route '/hello-world'
    public function testViewNested()
    {
        // Sending a GET request to the '/hello-world' route
        $this->get('/hello-world') // Make a GET request to the '/hello-world' route
            ->assertSeeText('Hello World'); // Verify if the response contains the text "Hello World"
    }

    // This test checks the direct rendering of views using the 'view()' helper method
    public function testTemplate()
    {
        // Directly rendering the 'hello' view and passing the 'name' variable as 'John'
        $this->view('hello', ['name' => 'John']) // Use the 'view()' helper to render the 'hello' view with the data ['name' => 'John']
            ->assertSeeText('Hello John'); // Verify if the rendered view contains the text "Hello John"

        // Directly rendering the 'hello.world' nested view and passing the 'name' variable as 'World'
        $this->view('hello.world', ['name' => 'World']) // Use the 'view()' helper to render the 'hello.world' nested view with the data ['name' => 'World']
            ->assertSeeText('Hello World'); // Verify if the rendered view contains the text "Hello World"
    }
}
