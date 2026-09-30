<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
});

Route::group(['prefix' => 'shop'], function () {
    Route::get('/dashboard', function () {
        return 'shop.dashboard';
    });
    Route::get('/users', function () {
        return 'shop.users';
    });
});
