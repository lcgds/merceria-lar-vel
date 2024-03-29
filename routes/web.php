<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products;
use App\Http\Controllers\Categories;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CartsController;

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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'isAdmin'], function () {

    //Categories

    Route::resource('/category', Categories::class, ['except' => ['show']]);
    Route::get('/trash/category', [Categories::class, 'trash'])->name('category.trash');
    Route::patch('/category/restore/{id}', [Categories::class, 'restore'])->name('category.restore');


    //Products

    Route::resource('/product', Products::class, ['except' => ['show']]);
    Route::get('/trash/product', [Products::class, 'trash'])->name('product.trash');
    Route::patch('/product/restore/{id}', [Products::class, 'restore'])->name('product.restore');


    //Tags

    Route::resource('/tag', TagController::class, ['except' => ['show']]);
    Route::get('/trash/tag', [TagController::class, 'trash'])->name('tag.trash');
    Route::patch('/tag/restore/{id}', [TagController::class, 'restore'])->name('tag.restore');
});

Route::group(['middleware' => 'auth'], function() {
    
    //Carts

    Route::get('/cart/add/{product}', [CartsController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{product}', [CartsController::class, 'remove'])->name('cart.remove');
    Route::get('cart/show', [CartsController::class, 'show'])->name('cart.show');
    Route::get('cart/payment', [CartsController::class, 'payment'])->name('cart.payment');
});

Route::resource('/category', Categories::class, ['only' => ['show']]);
Route::resource('/product', Products::class, ['only' => ['show']]);  
Route::resource('/tag', TagController::class, ['only' => ['show']]);  


