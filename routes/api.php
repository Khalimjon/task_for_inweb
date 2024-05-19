<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\PageApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('categories', CategoryApiController::class)->middleware('auth:sanctum');
Route::resource('pages', PageApiController::class)->middleware('auth:sanctum');
Route::resource('products', ProductApiController::class)->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
