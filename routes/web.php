<?php

use Illuminate\Support\Facades\Route;

// Define a GET route for the root URL ('/') that returns the 'welcome' view.
Route::get('/', function () {
    return view('welcome');
});

// Define a GET route for '/learn' that returns a simple text response.
Route::get('/learn', function () {
    return "Learn Laravel Basic";
});

// Redirect the '/youtube' route to '/learn' automatically.
Route::redirect('/youtube', '/learn');

// Fallback route to handle undefined routes, returning a "404 Not Found" message.
Route::fallback(function () {
    return "404 Not Found";
});

// Route definition for the URL '/hello' that returns a view called 'hello' 
// and passes an associative array with a value for 'name' which will be used inside the view.
Route::view('/hello', 'hello', ['name' => 'John']);

// Another route definition for the URL '/hello-john' that uses a closure function
// to return the same 'hello' view with the same 'name' value passed in the array.
Route::get('/hello-john', function () {
    return view('hello', ['name' => 'John']);
});

// Defining a route for the URL '/hello-world'.
// This route will return a view located in the nested directory 'hello.world' and pass an array containing 'name' => 'World'.
// The 'name' value will be accessible inside the 'hello/world' view.
Route::get('/hello-world', function () {
    return view('hello.world', ['name' => 'World']);
});

/*
Laravel Route Methods

// GET request: Retrieves data (e.g., showing a page)
Route::get($uri, $callback);

// POST request: Submits data (e.g., form submission)
Route::post($uri, $callback);

// PUT request: Updates an existing resource (requires full update)
Route::put($uri, $callback);

// PATCH request: Partially updates an existing resource
Route::patch($uri, $callback);

// DELETE request: Deletes a resource
Route::delete($uri, $callback);

// OPTIONS request: Retrieves available HTTP methods for a route
Route::options($uri, $callback);
*/