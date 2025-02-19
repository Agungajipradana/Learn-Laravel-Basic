<?php

namespace Tests\Unit; // Defines the namespace for this test class, placing it in the Unit tests category.

use PHPUnit\Framework\TestCase; // Uses PHPUnit's base TestCase class instead of Laravel's TestCase, as this is a unit test.

class ContohTest extends TestCase
{
    /**
     * A basic unit test example.
     * 
     * This test simply checks if `true` is indeed `true`,
     * serving as a basic example of a passing test.
     */
    public function test_example(): void
    {
        // Assert that 'true' is actually true.
        // This is a dummy test to verify that the test framework is working.
        $this->assertTrue(true);
    }
}
