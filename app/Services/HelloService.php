<?php

namespace App\Services; // Defines the namespace for this interface, organizing it under the 'App\Services' directory.

interface HelloService
{
    /**
     * A method declaration for saying hello.
     *
     * @param string $name The name to include in the greeting.
     * @return string The greeting message.
     */
    public function hello(string $name): string; // Declares a method that must be implemented by any class using this interface.
}
