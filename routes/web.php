<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/weather-compare', function () {
    return view('weather-compare');
})->name('weather-compare');

Route::get('/search', [WeatherController::class, 'search'])->name('weather.search');

Route::get('/weather-comparison', [WeatherController::class, 'compare'])->name('weather.compare');

Route::get('/history-logs', [WeatherController::class, 'list'])->name('weather.list');
