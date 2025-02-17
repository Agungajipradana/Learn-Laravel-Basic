<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

# Learn Laravel Basics (Version 11)

Welcome to Laravel 11! This guide will help you get started with Laravel, a powerful PHP framework that simplifies web application development.

## 🚀 Why Laravel?
Laravel is designed to make development enjoyable and efficient. With features like:
- **Elegant Syntax** – Write clean and readable code.
- **MVC Architecture** – Keep your project well-structured.
- **Eloquent ORM** – Interact with databases effortlessly.
- **Blade Templating** – Create dynamic and reusable views.
- **Built-in Authentication** – Secure your application with ease.
- **API Development** – Build RESTful APIs quickly.

## 📌 Prerequisites
Before diving in, make sure you have:
- **Basic knowledge of PHP**
- **Composer installed** ([Download Composer](https://getcomposer.org/))
- **Node.js installed** (for frontend assets, optional)
- **A web server** (e.g., Apache, Nginx, or Laravel Sail for Docker users)

## ⚡ Installation
You can install Laravel using Composer:
```sh
composer create-project laravel/laravel project_name
```
Or, if you have the Laravel Installer:
```sh
laravel new project_name
```
Navigate to your project directory and start the server:
```sh
php artisan serve
```
Your Laravel application should now be running at `http://127.0.0.1:8000` 🚀

## 📂 Laravel Folder Structure
Understanding Laravel's structure is crucial:
- `app/` - Core application logic.
- `routes/` - Defines web, API, and console routes.
- `database/` - Migrations, seeders, and factories.
- `resources/` - Views, assets, and language files.
- `config/` - Configuration settings.

## 🛤️ Routing & Controllers
### Defining a Route
```php
Route::get('/welcome', function () {
    return "Welcome to Laravel!";
});
```
### Creating a Controller
```sh
php artisan make:controller UserController
```
### Using a Controller
```php
Route::get('/users', [UserController::class, 'index']);
```

## 🎨 Blade Templating
### Creating a View
```html
<h1>Welcome to Laravel</h1>
```
### Passing Data to Views
```php
return view('home', ['name' => 'John']);
```
### Blade Syntax Example
```html
<h1>Hello, {{ $name }}</h1>
```

## 🗄️ Database & Eloquent ORM
### Configuring Database (`.env`)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```
### Creating Models & Migrations
```sh
php artisan make:model Post -m
```
### Running Migrations
```sh
php artisan migrate
```
### Using Eloquent ORM
```php
Post::create(['title' => 'New Post', 'content' => 'Post content']);
```

## 🛠️ CRUD Operations
### Create
```php
Post::create(['title' => 'New Post', 'content' => 'Post content']);
```
### Read
```php
$posts = Post::all();
```
### Update
```php
$post = Post::find(1);
$post->title = "Updated Title";
$post->save();
```
### Delete
```php
Post::destroy(1);
```

## 🔐 Authentication & Middleware
### Setting Up Authentication
```sh
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
php artisan migrate
```
### Protecting Routes
```php
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});
```

## 🌍 API Development with Laravel
### Creating an API Route
```php
Route::get('/posts', [PostController::class, 'index']);
```
### Returning JSON Data
```php
return response()->json(Post::all());
```

## 🎯 Conclusion
This guide covers the basics of Laravel 11, including routing, Blade templating, database interactions, authentication, and API development. To dive deeper, explore the [official Laravel documentation](https://laravel.com/docs).

Happy coding! 🚀

# Learn-Laravel-Basic
