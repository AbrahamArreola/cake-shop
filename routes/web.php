<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
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
    return redirect('/product');
});


Route::get('/index',[MainController::class, 'home ']);

Route::get('/about',[MainController::class, 'about']);

Route::get('/contact',[MainController::class, 'contact']);

/* Route::get('/product-registration', function() {
    return view('productCrud');
}); */

Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
//Route::resource('about', MainController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
