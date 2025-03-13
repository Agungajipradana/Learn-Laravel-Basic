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
Route::fallback(function(){
    return "404 Not Found";
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