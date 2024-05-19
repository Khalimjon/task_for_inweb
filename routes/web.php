<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function(){
    return view('admin.index');
})->name('admin.index')->middleware('admin.or.saler');
;

Route::prefix('/admin')->name('admin.')->middleware('web')->group(function(){
    Route::resource('pages', PageController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
})->middleware('admin.or.saler');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
