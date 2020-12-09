<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('index');
});


/* Admin routes */
Route::get('admin/panel', function () {
    return view('adminSection');
})->name('adminPanel');

/* Shop routes */
Route::get('shop/cart', function () {
    return view('shop.shopProducts');
})->name('shopCart');

Route::get('shop/orders', function () {
    return view('shop.productsOrders');
})->name('orders');

//Static pages
Route::get('/index',[MainController::class, 'home'])->name('index');

Route::get('/about',[MainController::class, 'about'])->name('about');

Route::get('/contact',[MainController::class, 'contact'])->name('contact');

/* Route::get('/product-registration', function() {
    return view('productCrud');
}); */

// PayPal Payment
Route::get('/paypal/status', [PaymentController::class, 'payPalStatus'])->name('payPalStatus');


// Google Verification
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
//Route::resource('about', MainController::class);

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */
