<?php

use App\Mail\FriendRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\TennisController;
use App\Http\Controllers\ResultsController;

Route::group(['middleware' => ['api']],function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
});

Route::group(['middleware' => ['api']],function () {
    Route::get('tennis', [TennisController::class, 'index']);
    Route::post('tennis', [TennisController::class, 'store']);
    Route::get('tennis/{id}', [TennisController::class, 'show']);
    Route::put('tennis/{id}', [TennisController::class, 'update']);
    Route::delete('tennis/{id}', [TennisController::class, 'destroy']);
}); 

Route::group(['middleware' => ['api']], function() {
    Route::get('results', [ResultsController::class, 'index']);
    Route::post('results', [ResultsController::class, 'store']);
    Route::get('results/{id}', [ResultsController::class, 'show']);
    Route::put('results/{id}', [ResultsController::class, 'update']);
    Route::delete('results/{id}', [ResultsController::class, 'destroy']);
}); 

Route::group(['middleware' => ['api']],function () {
    Route::get('friend', [FriendController::class, 'index']);
    Route::get('friend/{id}', [FriendController::class, 'inviteFriend']);
});