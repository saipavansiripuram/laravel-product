<?php

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\ProductController;
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


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dsa',function(){
//     return view("hello");
// });

Route::view('/', 'home');

Route::get("/products", [ProductController::class, 'index'])
    ->name('products.index');

Route::get("/products/create", [ProductController::class, 'create'])
    ->name('products.create');

Route::post("/products/store", [ProductController::class, 'store'])
    ->name('products.store');

// Route::get("/products/{id}",[ProductController::class,'show'])
//     ->name('products.show')
//     ->where('id','[0-9]+');
// //     // ->whereNumber('id');

Route::get("/products/{product}", [ProductController::class, 'show'])
    ->name('products.show');

Route::get("/products/{product}/edit", [ProductController::class, 'edit'])
    ->name('products.edit');

Route::patch("/products/{product}", [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');


// Route::controller(ProductController::class)
// ->prefix('products')
// ->name('products.')
// ->group(function () {
//     Route::get("/", 'index')
//         ->name('index');

//     Route::get("/create", 'create')
//         ->name('create');

//     Route::post("/store", 'store')
//         ->name('store');

//     Route::get("/{product}", 'show')
//         ->name('show');

//     Route::get("/{product}/edit", 'edit')
//         ->name('edit');

//     Route::patch("/{product}", 'update')
//         ->name('update');

//     Route::delete('/{product}', 'destroy')
//         ->name('destroy');
// });
