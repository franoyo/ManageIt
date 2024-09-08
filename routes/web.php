<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\tareasExcelController;


Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/index', function () {
    return view('index');
});
Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
});
Route::middleware('usuario')->controller(TareasController::class)->group(function () {
    Route::get('/dashboard','dashboard')->name('dashboard');
    Route::post('/agregarTarea','agregarTarea')->name('agregarTarea');
    Route::post('/updateTarea','updateTarea')->name('updateTarea');
    Route::post('/inhabilitar','inhabilitarTarea')->name('inhabilitar');
    Route::post('/borrarImagen','borrarImagen')->name('borrarImagen');
    Route::get('/obtenerDatosTareaAjax/{id}', 'obtenerDatosTareasAjax')->name('obtenerDatosTareasAjax');
    Route::get('/ver/{id}','verTarea')->name('ver');
    Route::get('/buscarTarea', 'filtroCrudTareas')->name('buscarTarea');
    Route::get('/back', 'back')->name('back');
    Route::get('/test', 'test')->name('test');

});
Route::controller(TareasController::class)->group(function () {
    Route::post('/authenticate','authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});
Route::middleware('usuario')->controller(tareasExcelController::class)->group(function () {
    Route::get('/tareasExcel', 'exportExcelTareas')->name('tareasExcel');
});


