<?php

use Illuminate\Support\Facades\Route;


Route::apiresource('products', \App\Http\Controllers\ProductController::class);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('user', [\App\Http\Controllers\UserController::class, 'show']);
});

Route::get('search', \App\Http\Controllers\SearchController::class);

Route::post('generate/token', \App\Http\Controllers\GenerateTokenController::class);
