<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/page/{slug}', [PageController::class, 'index'])->name('page.index');

Route::get('/hello/{name?}', function (string $name = '') {
    return view('hello', ['name' => $name]);
})->where('name', '[A-Za-z]+');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'admin.dashboard';
    });
    Route::get('/users', function () {
        return 'admin.users';
    });
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index']);
    Route::get('/pages/{slug}', [\App\Http\Controllers\Admin\MainController::class, 'pages']);
});

Route::group(['prefix' => 'shop'], function () {
    Route::get('/dashboard', function () {
        return 'shop.dashboard';
    });
    Route::get('/users', function () {
        return 'shop.users';
    });
});
