<?php

use Illuminate\Support\Facades\Route;

//import product controller
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;

//route resource for products
Route::resource('/suppliers', SupplierController::class);
Route::resource('/purchases', PurchaseController::class);

Route::get('/', function () {
    return view('welcome');
});