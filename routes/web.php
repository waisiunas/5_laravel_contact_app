<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\RedirectIfAuthenticated;

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

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
        Route::get('register', 'register_view')->name('register');
        Route::post('register', 'register');
    });

    Route::middleware(Authenticate::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::controller(ContactController::class)->middleware(Authenticate::class)->group(function () {
    Route::get('contacts', 'index')->name('contacts');
});

Route::get('profile/edit', function() {
    return view('profile.edit');
})->name('profile.edit');
