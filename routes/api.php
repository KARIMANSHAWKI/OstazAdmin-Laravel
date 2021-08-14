<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Api\Auth\RegisterApiController;
use  App\Http\Controllers\Api\SubscribeCategoryController;
use  App\Http\Controllers\Api\SubscribeProgramController;
use  App\Http\Controllers\Api\NonSubscribedProController;
use  App\Http\Controllers\Api\NonSubscribedCatController;
use  App\Http\Controllers\Api\SubscribedCatController;
use  App\Http\Controllers\Api\SubscribedProController;
use App\Http\Controllers\Dashboard\SettingController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::post('user/subscribe-category', [SubscribeCategoryController::class, 'subscribeCategory']);
    Route::post('user/subscribe-program', [SubscribeProgramController::class, 'subscribeProgram']);

    Route::get('user/nosubscribed-programs', [NonSubscribedProController::class, 'getNonSubscribedPro']);
    Route::get('user/nosubscribed-categories', [NonSubscribedCatController::class, 'getNonSubscribedCat']);

    Route::get('user/subscribed-categories', [SubscribedCatController::class, 'getSubscribedCat']);
    Route::get('user/subscribed-programs', [SubscribedProController::class, 'getSubscribedPro']);


});



Route::post('user/login',[LoginApiController::class, 'login'] );
Route::post('user/register',[RegisterApiController::class, 'register'] );
Route::post('send-notification', [SettingController::class, 'send']);


