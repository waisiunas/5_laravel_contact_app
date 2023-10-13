<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactListController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(Authenticate::class)->group(function () {
    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('edit', 'edit')->name('edit');
        // Route::post('details', 'update_details')->name('details');
        Route::patch('details', 'update_details')->name('details');
        // Route::post('password', 'update_password')->name('password');
        Route::patch('picture', 'update_picture')->name('picture');
        Route::patch('password', 'update_password')->name('password');
    });

    Route::controller(ContactListController::class)->group(function () {
        Route::get('lists', 'index')->name('lists');
        Route::prefix('list')->name('list.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{contact_list}/edit', 'edit')->name('edit');
            Route::patch('{contact_list}/edit', 'update');
            Route::delete('{contact_list}/destroy', 'destroy')->name('destroy');
        });
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get('contacts', 'index')->name('contacts');
        Route::prefix('contact')->name('contact.')->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('create', 'store');
            Route::get('{contact}/show', 'show')->name('show');
            Route::get('{contact}/edit', 'edit')->name('edit');
            Route::patch('{contact}/edit', 'update');
            Route::delete('{contact}/destroy', 'destroy')->name('destroy');
        });
    });
});
