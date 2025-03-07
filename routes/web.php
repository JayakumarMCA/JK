<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
Route::post('/login', [LoginController::class, 'login'])->name('login');
