<?php

namespace App\Services; // Defines the namespace for this class, organizing it under the 'App\Services' directory.

use App\Services\HelloService; // Imports the HelloService interface to ensure this class follows its contract.

class HelloServiceIndonesia implements HelloService
{
    /**
     * Implements the hello() method from the HelloService interface.
     * 
     * @param string $name The name to include in the greeting.
     * @return string The greeting message in Indonesian.
     */
    public function hello(string $name): string
    {
        return "Halo $name"; // Returns a greeting in Indonesian.
    }
}
