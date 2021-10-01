<?php

use App\Http\Controllers\Client\Home\HomeController;
use App\Http\Controllers\Client\Product\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Home
Route::get('/', [HomeController::class, 'index'])->name('client.home.index');

//Product
Route::get('productos/quick-view/{product}', [ProductController::class, 'quickView'])->name('client.product.quick-view');
Route::resource('/productos', ProductController::class)->parameters(['productos' => 'product'])->names('client.product');

