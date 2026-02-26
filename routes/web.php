<?php

use App\Http\Controllers\UnsubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/unsubscribe', UnsubscribeController::class)->name('unsubscribe');

Route::view('/polityka-prywatnosci', 'privacy-policy')->name('privacy-policy');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
