<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Route::get("/", [CategoryController::class, "index"]);
Route::get("/", [ProductController::class, "index"]);
Route::get("/product/{slug}", [ProductController::class, "show"])->name(
    "product.product-detail.show",
);
