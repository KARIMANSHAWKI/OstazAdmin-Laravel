<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Api\Auth\RegisterApiController;
use  App\Http\Controllers\Api\SubscribeCategoryController;
use  App\Http\Controllers\Api\SubscribeProgramController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::post('user/subscribe-category', [SubscribeCategoryController::class, 'subscribeCategory']);
    Route::post('user/subscribe-program', [SubscribeProgramController::class, 'subscribeProgram']);

});


Route::post('user/login',[LoginApiController::class, 'login'] );
Route::post('user/register',[RegisterApiController::class, 'register'] );

