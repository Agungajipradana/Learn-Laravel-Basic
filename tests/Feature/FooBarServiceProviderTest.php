<?php

namespace Tests\Feature;

// Import necessary classes
use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * This test class verifies that the FooBarServiceProvider correctly registers 
 * and binds services into the Laravel service container.
 */
class FooBarServiceProviderTest extends TestCase
{
    /**
     * Test if the service provider correctly registers Foo and Bar as singletons.
     */
    public function testServiceProvider()
    {
        // Retrieve two instances of Foo from the service container
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        // Assert that both instances are the same (singleton)
        self::assertSame($foo1, $foo2);

        // Retrieve two instances of Bar from the service container
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        // Assert that both instances are the same (singleton)
        self::assertSame($bar1, $bar2);

        // Assert that the Foo instance used inside Bar is the same as the singleton Foo instance
        self::assertSame($foo1, $bar1->foo);
        self::assertSame($foo2, $bar2->foo);
    }

    /**
     * Test if the HelloService binding in the provider is correctly registered as a singleton.
     */
    public function testPropertySingletons()
    {
        // Retrieve two instances of HelloService from the service container
        $helloService1 = $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);

        // Assert that both instances are the same (singleton)
        self::assertSame($helloService1, $helloService2);

        // Assert that the HelloService returns the expected greeting message
        self::assertEquals('Halo Jhon', $helloService1->hello('Jhon'));
    }

    /**
     * A basic placeholder test to ensure the test suite runs properly.
     * This test does not perform any meaningful assertion.
     */
    public function testEmpty()
    {
        self::assertTrue(true);
    }
}
