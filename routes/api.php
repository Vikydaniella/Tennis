<?php

use App\Mail\FriendRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\TennisController;
use App\Http\Controllers\ResultsController;


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

Route::controller(ResultsController::class)->group(function () {
    Route::get('results', 'index');
    Route::post('results', 'store');
    Route::get('results/{id}', 'show');
    Route::put('results/{id}', 'update');
    Route::delete('results/{id}', 'destroy');
}); 

Route::controller(FriendController::class)->group(function () {
    Route::get('friend', 'index');
    Route::get('friend/{id}', 'inviteFriend');
});