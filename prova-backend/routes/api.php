<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/activities', [ActivityController::class, 'store']);
Route::get('/activities', [ActivityController::class, 'showAll']);
Route::post('/activities/book', [ActivityController::class, 'bookActivity']);