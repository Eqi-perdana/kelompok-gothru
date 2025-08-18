<?php

use Illuminate\Support\Facades\Route;

// Import controller yang sudah ada
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\ProductPriceHistoryController; // <-- tambah ini

// Route resource untuk semua entitas
Route::resource('users', UserController::class);
Route::resource('sales', SaleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('purchase_items', PurchaseItemController::class);
Route::resource('sale_items', SaleItemController::class);
Route::resource('product_price_history', ProductPriceHistoryController::class); // <-- tambah ini

// Route default (halaman utama)
Route::get('/', function () {
    return view('welcome');
});
