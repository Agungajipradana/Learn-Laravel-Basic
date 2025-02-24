<?php

namespace App\Data; // Defines the namespace for this class, organizing it under the 'App\Data' directory.

class Person
{
    /**
     * Constructor method using PHP 8 property promotion.
     * 
     * @param string $firstName The first name of the person.
     * @param string $lastname The last name of the person.
     */
    public function __construct(
        public string $firstName, // Automatically declares and assigns a public property $firstName.
        public string $lastname // Automatically declares and assigns a public property $lastname.
    ) {}
}
