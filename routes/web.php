<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products;

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

Route::get('/', function() {
    return view('welcome');
});


//Products
Route::get('/product', [Products::class, 'index'])->name('product.index');
Route::get('/product/create', [Products::class, 'create'])->name('product.create');
Route::post('/product/store', [Products::class, 'store'])->name('product.store');