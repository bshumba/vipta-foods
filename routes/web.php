<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::view('/products', 'pages.products')->name('products');

Route::view('/our-story', 'pages.our-story')->name('our-story');

Route::view('/impact', 'pages.impact')->name('impact');

Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/sitemap.xml', function () {
    $routes = collect(config('vipta.navigation', []))
        ->pluck('route')
        ->prepend('home')
        ->unique()
        ->values();

    return response()
        ->view('sitemap', ['routes' => $routes])
        ->header('Content-Type', 'application/xml');
})->name('sitemap');
