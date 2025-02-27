<?php

namespace Tests\Feature;

// Import necessary classes for testing
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config; // Import Laravel Config Facade
use Tests\TestCase;

/**
 * This test class verifies how the Config Facade works and 
 * how it interacts with Laravel's service container.
 */
class FacadeTest extends TestCase
{
    /**
     * Test if retrieving configuration values via the `config()` helper 
     * and the `Config` Facade returns the same result.
     */
    public function testConfig()
    {
        // Retrieve the value using the global config() helper
        $firstName1 = config('contoh.author.first');

        // Retrieve the value using the Config Facade
        $firstName2 = Config::get('contoh.author.first');

        // Assert that both values are the same
        self::assertEquals($firstName1, $firstName2);

        // Dump all configuration values to the test output
        var_dump(Config::all());
    }

    /**
     * Test if the `config()` helper, `Config` Facade, and the direct 
     * dependency injection of the config service return the same result.
     */
    public function testConfigDependency()
    {
        // Retrieve the config service directly from the Laravel service container
        $config = $this->app->make('config');

        // Retrieve configuration values using different methods
        $firstName3 = $config->get('contoh.author.first');
        $firstName1 = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        // Assert that all retrieved values are the same
        self::assertEquals($firstName1, $firstName2);
        self::assertEquals($firstName1, $firstName3);

        // Dump all configuration values to the test output
        var_dump($config->all());
    }

    /**
     * Test if the Config Facade can be mocked.
     * This is useful for testing scenarios where we want to return a fake value.
     */
    public function testFacadeMock()
    {
        // Mock the Config Facade to return a custom value when 'contoh.author.first' is requested
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Jhon Cool');

        // Retrieve the mocked value
        $firstName = Config::get('contoh.author.first');

        // Assert that the returned value matches the mocked value
        self::assertEquals('Jhon Cool', $firstName);
    }
}
