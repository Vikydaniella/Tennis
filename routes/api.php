<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TennisController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\ResultsController;
use App\Mail\FriendRequest;
use Illuminate\Support\Facades\Mail;


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

Route::controller(PointsController::class)->group(function () {
    Route::get('points', 'index');
    Route::post('points', 'store');
    Route::get('points/{id}', 'show');
    Route::put('points/{id}', 'update');
    Route::delete('points/{id}', 'destroy');
}); 

Route::controller(ResultsController::class)->group(function () {
    Route::get('results', 'index');
    Route::post('results', 'store');
    Route::get('results/{id}', 'show');
    Route::put('results/{id}', 'update');
    Route::delete('results/{id}', 'destroy');
}); 

Route::get('/testroute', function() {
    $name = "Friend Request";
    Mail::to('user{id}’')->send(new FriendRequest($name));
});