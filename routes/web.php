<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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


//API
Route::get('product/info/{id}', function ($id) {
    try{
        $product = Product::findOrfail($id);
        return response()->json([
            'ok' => true,
            'product' => collect($product)->except(['created_at', 'updated_at', 'image', 'deleted_at', 'category_id'])
        ]);
    } catch(ModelNotFoundException  $err){
        return response()->json([
            'ok' => false,
            'error' => 'El producto con id: ' . $id . ' no existe'
        ], 400);
    }
});

Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
//Route::resource('about', MainController::class);

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */
