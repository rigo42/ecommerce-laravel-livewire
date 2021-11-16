<?php

use App\Http\Controllers\Client\About\AboutController;
use App\Http\Controllers\Client\Cart\CartController;
use App\Http\Controllers\Client\Category\CategoryController;
use App\Http\Controllers\Client\Checkout\CheckoutController;
use App\Http\Controllers\Client\Home\HomeController;
use App\Http\Controllers\Client\Product\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Home
Route::get('/', [HomeController::class, 'index'])->name('client.home.index');

//About
Route::get('/nosotros', [AboutController::class, 'index'])->name('client.about.index');

//Category
Route::get('/categorias', [CategoryController::class, 'index'])->name('client.category.index');

//Product
Route::resource('/productos', ProductController::class)->parameters(['productos' => 'product'])->names('client.product');

//Cart
Route::resource('/carrito', CartController::class)->parameters(['carrito' => 'product'])->names('client.cart');

//Checkout
Route::get('checkout/', [CheckoutController::class, 'index'])->name('client.checkout.index')->middleware('auth');
Route::get('checkout/invitado', [CheckoutController::class, 'index'])->name('client.checkout_guest.index'); 
Route::get('checkout/pedido-confirmado/{order}', [CheckoutController::class, 'confirmation'])->name('client.checkout.confirmated');
