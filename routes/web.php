<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name('home');
Route::get("/products/{id}", [ProductController::class, "show"])->name(
    "products.show"
);
Route::get('status/{product}', [ProductController::class, 'changeStatus']);   //it should be PATCH but it's not allowed for the browser
Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store'); // make a review for the product
