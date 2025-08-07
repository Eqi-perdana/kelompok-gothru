<?php

use Illuminate\Support\Facades\Route;

// import controller yang sudah ada
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;

// import controller baru
use App\Http\Controllers\CategoryController;

// route resource untuk users dan sales
Route::resource('/users', UserController::class);
Route::resource('/sales', SaleController::class);

// default route
Route::get('/', function () {
    return view('welcome');
});
