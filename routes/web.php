<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/products', [ProductController::class, 'show']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('prodDelete');
Route::get('product/form/{id?}', [ProductController::class, 'form'])->name('product.form');
Route::post('product/save', [ProductController::class, 'save'])->name('product.save');

Route::get('/brands', [BrandController::class, 'show']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brandDelete');
Route::get('brand/form/{id?}', [BrandController::class, 'form'])->name('brand.form');
Route::post('brand/save', [BrandController::class, 'save'])->name('brand.save');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\InvoiceController;
Route::get('/invoices',[InvoiceController::class, 'show']);
