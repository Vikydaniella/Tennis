<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TennisController;


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(TennisController::class)->group(function () {
    Route::get('tennis', 'index');
    Route::post('tennis', 'store');
    Route::get('tennis/{id}', 'show');
    Route::put('tennis/{id}', 'update');
    Route::delete('tennis/{id}', 'destroy');
}); 
