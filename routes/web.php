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
use App\Http\Controllers\CampaignController;

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
Route::get('/test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('developer01@caddcentre.com')->subject('Test Email');
    });
    return 'Test email sent!';
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/events', [HomeController::class, 'getEvent']);
    Route::get('/fetch-events', [HomeController::class, 'getFetchEvents'])->name('fetch.events');
    Route::get('/get-assets', [HomeController::class, 'getAssetLists']);
    Route::get('/fetch-assets', [HomeController::class, 'getAssetDetails'])->name('fetch.asset');
    Route::post('/fetch-asset', [HomeController::class, 'fetchDownloadAsset'])->name('fetch.downloadasset');
    Route::post('/bulk-download', [HomeController::class, 'bulkDownload'])->name('bulk.download.asset');
    Route::resource('/enquiries', EnquiryController::class);
    Route::post('/log-usage', [HomeController::class, 'storeEventLog'])->name('usage.log');
    Route::post('/send-asset-email', [HomeController::class, 'sendAssetEmail'])->name('send.asset.email');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [HomeController::class, 'getDashboard'])->name('dashboard');
        Route::resource('roles', RolePermissionController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('assetdatas', AssetController::class);
        Route::resource('events', EventController::class);
        Route::resource('users', UserController::class);
        Route::resource('campaigns', CampaignController::class);
    });
});