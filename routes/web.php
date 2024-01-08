<?php

use App\Http\Controllers\ClickController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [\App\Http\Controllers\LinkController::class, 'index'])->name('links.index');
Route::post('/result', [\App\Http\Controllers\LinkController::class, 'store'])->name('links.store');
Route::get('/statistics', [\App\Http\Controllers\LinkController::class, 'shortLink'])->name('links.shortLink');
Route::post('/clicks', [\App\Http\Controllers\LinkController::class, 'showClicks'])->name('links.showClicks');


Route::get('/{short_link}', [\App\Http\Controllers\ClickController::class, 'redirectToOriginal'])->name('click.redirect');

