<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function(){


    Route::prefix('auth')->group(function(){
        Route::post('login',[AuthController::class,'login']);
    });

});


