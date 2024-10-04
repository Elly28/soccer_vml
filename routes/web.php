<?php

use App\Http\Controllers\FixtureController;
use App\Http\Controllers\StandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fixture', [FixtureController::class, 'index'])->name('fixture');
Route::get('/standing', [StandingController::class, 'index'])->name('standing');
