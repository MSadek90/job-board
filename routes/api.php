<?php

use App\Http\Controllers\Api\PostApiController;


Route::prefix('v1')->group(function(){
    Route::apiResource('posts', PostApiController::class);
});

