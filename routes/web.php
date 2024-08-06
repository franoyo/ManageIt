<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;


Route::get('/', function () {
    return view('index');
});
Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

