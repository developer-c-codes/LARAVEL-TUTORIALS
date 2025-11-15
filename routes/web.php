<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');  // call the index methos in productcontroller to show products in views
Route::post('/products', [ProductController::class, 'store'])->name('products.store');  // call the store method in preductcontroller to store product in database

Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');   // {id}/edit -> edit form for product with specific id ::get method used to show the form to be edit
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');  // u[date product with specific id :: put method used to submit the edited form

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');