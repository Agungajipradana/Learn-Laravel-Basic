<?php

return [
    /**
     * Author information stored in an associative array.
     * The first and last names are retrieved from environment variables
     * with default values in case they are not set.
     */
    "author" => [
        // Get the first name from the environment variable 'NAME_FIRST', defaulting to "Jhon"
        'first' => env('NAME_FIRST', "Jhon"),

        // Get the last name from the environment variable 'NAME_LAST', defaulting to "Doe"
        "last" => env('NAME_LAST', "Doe")
    ],

    /**
     * Static email address for the author.
     */
    "email" => "jhon.doe@gmail.com",

    /**
     * Static website URL.
     */
    "web" => "https://www.learnlaravelbasic.com"
];
