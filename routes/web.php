<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/history-log', function () {
    return view('history-log');
})->name('history-log');

Route::get('/weather-compare', function () {
    return view('weather-compare');
})->name('weather-compare');

Route::get('/search', [WeatherController::class, 'search'])->name('weather.search');
