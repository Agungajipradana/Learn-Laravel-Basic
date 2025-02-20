<?php

namespace Tests\Feature; // Defines the namespace for this test class, categorizing it under Feature tests.

use App\Data\Foo; // Imports the Foo class from the App\Data namespace.
use App\Data\Bar; // Imports the Bar class from the App\Data namespace.
use Illuminate\Foundation\Testing\RefreshDatabase; // Trait for refreshing the database between tests (not used in this test).
use Illuminate\Foundation\Testing\WithFaker; // Trait for generating fake data in tests (not used in this test).
use Tests\TestCase; // Base test class provided by Laravel, which all test cases should extend.

class DependencyInjectionTest extends TestCase
{
    /**
     * Test to verify Dependency Injection in the Bar class.
     */
    public function testDependencyInjection()
    {
        // Create an instance of Foo
        $foo = new Foo;

        // Inject the Foo instance into Bar through its constructor
        $bar = new Bar($foo);

        // Assert that the bar() method returns "Foo and Bar"
        self::assertEquals('Foo and Bar', $bar->bar());
    }
}
