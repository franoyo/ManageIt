<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\TareasController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/index', function () {
    return view('index');
});
Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
});
Route::controller(TareasController::class)->group(function () {
    Route::get('/dashboard','dashboard')->name('dashboard');
    Route::post('/authenticate','authenticate')->name('authenticate');
    Route::post('/logout','logout')->name('logout');
    Route::post('/agregarTarea','agregarTarea')->name('agregarTarea');
})->middleware('usuario');


