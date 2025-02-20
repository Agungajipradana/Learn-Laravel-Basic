<?php

namespace App\Data; // Defines the namespace for this class, organizing it under the 'App\Data' directory.

class Bar
{
    private Foo $foo; // Declares a private property of type Foo.

    /**
     * Constructor method that initializes the Foo dependency.
     *
     * @param Foo $foo An instance of the Foo class, injected via dependency injection.
     */
    public function __construct(Foo $foo)
    {
        $this->foo = $foo; // Assigns the passed Foo instance to the class property.
    }

    /**
     * Method that combines the output of Foo::foo() with the string "and Bar".
     *
     * @return string The combined result of Foo::foo() and "and Bar".
     */
    public function bar(): string
    {
        return $this->foo->foo() . ' and Bar'; // Calls Foo's foo() method and appends " and Bar".
    }
}
