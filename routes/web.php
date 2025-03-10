<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;

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
Route::get('/events', function () {
    return view('admin.event');
});
Route::resource('users', UserController::class);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'create'])->name('register');
Route::resource('/assetdatas', AssetController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RolePermissionController::class);
    Route::resource('permissions', PermissionController::class);
});