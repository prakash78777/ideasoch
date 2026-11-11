<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\BusinessApiController;
use App\Http\Controllers\Api\MobileAuthController;
use App\Http\Controllers\Api\GoogleAuthController;

// Flutter Login
Route::post('/login', [MobileAuthController::class, 'login']);

// Google Login (Public Route)
Route::post('/google-login', [GoogleAuthController::class, 'login']);

// Business Listing API
Route::get('/businesses', [BusinessApiController::class, 'index']);

// Business Image API
Route::get('/business-image/{id}', [BusinessApiController::class, 'image']);

// Protected APIs
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [MobileAuthController::class, 'logout']);

    Route::post('/saved-ideas/{id}', [MobileAuthController::class, 'saveIdea']);

    Route::get('/saved-ideas', [MobileAuthController::class, 'savedIdeas']);

    Route::delete('/saved-ideas/{id}', [MobileAuthController::class, 'removeIdea']);

});
