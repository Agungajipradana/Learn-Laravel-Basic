<?php

namespace Tests\Feature;

use App\Data\Bar; // Imports the Bar class from the App\Data namespace.
use App\Data\Foo; // Imports the Foo class from the App\Data namespace.
use App\Data\Person; // Imports the Person class from the App\Data namespace.
use App\Services\HelloService; // Imports the HelloService interface.
use App\Services\HelloServiceIndonesia; // Imports the HelloServiceIndonesia class.
use Illuminate\Foundation\Testing\RefreshDatabase; // Trait to refresh the database between tests (not used in this test).
use Illuminate\Foundation\Testing\WithFaker; // Trait for generating fake data (not used in this test).
use Tests\TestCase; // The base test class for Laravel testing.

class ServiceContainerTest extends TestCase
{
    /**
     * Test dependency injection without bindings (using make method).
     */
    public function testDependency()
    {
        // Get instances of Foo from the service container
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        // Assert that both Foo instances return the correct value
        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());

        // Assert that the two instances are not the same (different objects)
        self::assertNotSame($foo1, $foo2);
    }

    /**
     * Test binding a class with a closure in the service container.
     */
    public function testBind()
    {
        // Bind the Person class to a closure, providing a custom Person object
        $this->app->bind(Person::class, function ($app) {
            return new Person("Jhon", "Doe");
        });

        // Get instances of Person from the container
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        // Assert that both Person instances have the same first name
        self::assertEquals("Jhon", $person1->firstName);
        self::assertEquals("Jhon", $person2->firstName);

        // Assert that the two instances are not the same (different objects)
        self::assertNotSame($person1, $person2);
    }

    /**
     * Test singleton binding in the service container.
     */
    public function testSingleton()
    {
        // Bind the Person class as a singleton in the service container
        $this->app->singleton(Person::class, function ($app) {
            return new Person("Jhon", "Doe");
        });

        // Get instances of Person from the container
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        // Assert that both instances have the same first name
        self::assertEquals("Jhon", $person1->firstName);
        self::assertEquals("Jhon", $person2->firstName);

        // Assert that the two instances are the same (same object)
        self::assertSame($person1, $person2);
    }

    /**
     * Test instance binding in the service container.
     */
    public function testInstance()
    {
        // Create a Person object and bind it directly as an instance
        $person = new Person("Jhon", "Doe");
        $this->app->instance(Person::class, $person);

        // Get instances of Person from the container
        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        // Assert that both instances have the same first name
        self::assertEquals("Jhon", $person1->firstName);
        self::assertEquals("Jhon", $person2->firstName);

        // Assert that the two instances are the same (same object)
        self::assertSame($person1, $person2);
    }

    /**
     * Test dependency injection with multiple dependencies (Foo and Bar).
     */
    public function testDependencyInjection()
    {
        // Bind Foo and Bar as singletons in the service container
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            // Bar depends on Foo, so we retrieve Foo from the container
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        // Get instances of Foo and Bar from the container
        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        // Assert that Bar1's Foo instance is the same as the Foo instance
        self::assertSame($foo, $bar1->foo);

        // Assert that Bar1 and Bar2 are the same instance (since Bar is a singleton)
        self::assertSame($bar1, $bar2);
    }

    /**
     * Test interface binding and dependency injection (HelloService -> HelloServiceIndonesia).
     */
    public function testInterfaceToClass()
    {
        // Bind the HelloService interface to the HelloServiceIndonesia implementation
        $this->app->singleton(HelloService::class, function ($app) {
            return new HelloServiceIndonesia();
        });

        // Get an instance of HelloService from the container
        $helloService = $this->app->make(HelloService::class);

        // Assert that the hello() method returns the correct greeting
        self::assertEquals('Halo Jhon', $helloService->hello('Jhon'));
    }
}
