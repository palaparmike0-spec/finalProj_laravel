<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ExhibitController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\VisitorController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('artists', ArtistController::class);
Route::resource('exhibits', ExhibitController::class);
Route::resource('tours', TourController::class);
Route::resource('visitors', VisitorController::class);