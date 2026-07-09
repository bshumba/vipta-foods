<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $routes = collect(config('vipta.navigation', []))
            ->pluck('route')
            ->prepend('home')
            ->unique()
            ->values();

        return response()
            ->view('sitemap', ['routes' => $routes])
            ->header('Content-Type', 'application/xml');
    }
}
