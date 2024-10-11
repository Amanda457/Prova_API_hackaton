<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}',[UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}',[UserController::class, 'destroy']);

Route::post('/activities', [ActivityController::class, 'store']);
Route::get('/activities', [ActivityController::class, 'showAll']);
Route::post('/activities/book', [ActivityController::class, 'bookActivity']);
Route::post('/activities/import', [ActivityController::class, 'importActivities']);

