<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/eventhtml', function () {
    return view('admin.eventhtml');
});
Route::get('/register', function () {
    return view('auth.register');
});
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });
Route::get('/pagehtml', function () {
    return view('admin.pagehtml');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::group(['middleware' => 'auth'], function () {
    
});