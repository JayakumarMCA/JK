<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/page', function () {
    return view('admin.page');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/events', [HomeController::class, 'getEvent']);
Route::get('/fetch-events', [HomeController::class, 'getFetchEvents'])->name('fetch.events');
Route::resource('/enquiries', EnquiryController::class);
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::resource('roles', RolePermissionController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('assetdatas', AssetController::class);
    Route::resource('events', EventController::class);
    Route::resource('users', UserController::class);
});