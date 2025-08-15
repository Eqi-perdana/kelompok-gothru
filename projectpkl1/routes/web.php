<?php

use Illuminate\Support\Facades\Route;

// Import controller yang sudah ada
use App\Http\Controllers\UserController;
use App\Http\Controllers\SaleController;

// Import controller baru
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita mendefinisikan semua route web untuk aplikasi.
| Route resource akan otomatis membuat semua route CRUD
| untuk controller yang bersangkutan.
|
*/

// Route resource untuk users, sales, categories, products, suppliers, purchases, dan purchase_items
Route::resource('users', UserController::class);
Route::resource('sales', SaleController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('purchase-items', PurchaseItemController::class); // <--- ditambahkan

// Route default (halaman utama)
Route::get('/', function () {
    return view('welcome');
});
