<?php

namespace App\Providers;

// Import necessary classes
use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * This service provider is responsible for registering dependencies
 * and defining singleton bindings in the Laravel service container.
 * It also implements DeferrableProvider, meaning it loads services only when needed.
 */
class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Define singleton bindings that should be resolved only once.
     * When HelloService is requested, Laravel will provide an instance of HelloServiceIndonesia.
     */
    public array $singletons = [
        HelloService::class => HelloServiceIndonesia::class
    ];

    /**
     * Register services in the service container.
     */
    public function register(): void
    {
        // Register Foo as a singleton, meaning only one instance will be created and shared
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        // Register Bar as a singleton, which depends on Foo
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class)); // Injecting Foo into Bar
        });
    }

    /**
     * Bootstrap services (if needed).
     * This method is executed after all service providers have been registered.
     */
    public function boot(): void
    {
        // No additional boot logic is needed in this service provider.
    }

    /**
     * Define which services this provider provides.
     * This helps Laravel optimize performance by only loading the provider when necessary.
     */
    public function provides()
    {
        return [HelloService::class, Foo::class, Bar::class];
    }
}
