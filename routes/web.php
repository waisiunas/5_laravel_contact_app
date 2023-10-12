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
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile/edit', 'edit')->name('profile.edit');
        // Route::post('profile/details', 'update_details')->name('profile.details');
        Route::patch('profile/details', 'update_details')->name('profile.details');
        // Route::post('profile/password', 'update_password')->name('profile.password');
        Route::patch('profile/picture', 'update_picture')->name('profile.picture');
        Route::patch('profile/password', 'update_password')->name('profile.password');
    });

    Route::controller(ContactListController::class)->group(function (){
        Route::get('lists', 'index')->name('lists');
        Route::get('list/create', 'create')->name('list.create');
        Route::post('list/create', 'store');
        Route::get('list/{contact_list}/edit', 'edit')->name('list.edit');
        Route::patch('list/{contact_list}/edit', 'update');
        Route::delete('list/{contact_list}/destroy', 'destroy')->name('list.destroy');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get('contacts', 'index')->name('contacts');
        Route::get('contact/create', 'create')->name('contact.create');
        Route::post('contact/create', 'store');
        Route::get('contact/{contact}/edit', 'edit')->name('contact.edit');
        Route::patch('contact/{contact}/edit', 'update');
        Route::delete('contact/{contact}/destroy', 'destroy')->name('contact.destroy');
    });
});
