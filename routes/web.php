<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('main');
});

Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'es'])) {
        abort(400);
    }
 
    App::setLocale($locale);
    session()->put('locale', $locale);
 
    return redirect()->back();
});

Route::get('sitemap.xml', function () {
    SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
    return response()->file(public_path('sitemap.xml'));
});
