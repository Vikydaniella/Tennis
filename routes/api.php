<?php

use App\Mail\FriendRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\TennisController;
use App\Http\Controllers\ResultsController;


Route::group(['middleware' => ['api']],function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
});

Route::group(['middleware' => ['api']],function () {
    Route::get('tennis', 'TennisController@index');
    Route::post('tennis', 'TennisController@store');
    Route::get('tennis/{id}', 'TennisController@show');
    Route::put('tennis/{id}', 'TennisController@update');
    Route::delete('tennis/{id}', 'TennisController@destroy');
}); 

Route::group(['middleware' => ['api']], function() {
    Route::get('results', 'ResultsController@index');
    Route::post('results', 'ResultsController@store');
    Route::get('results/{id}', 'ResultsController@show');
    Route::put('results/{id}', 'ResultsController@update');
    Route::delete('results/{id}', 'ResultsController@destroy');
}); 

Route::group(['middleware' => ['api']],function () {
    Route::get('friend', 'FriendController@index');
    Route::get('friend/{id}', 'FriendController@inviteFriend');
});