<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TennisController;

Route::middleware('auth:api')->prefix('v1')->group(function(){
    Route::get('/user',function(Request $request){
    return $request->user();
});
    Route::apiresource('/tennis', TennisController::class);
});
