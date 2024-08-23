<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('products', ProductController::class);
Route::get('/', function () {
    $products = App\Models\Product::with('category')->get();
    return view('landing', compact('products'));
})->name('landing');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
