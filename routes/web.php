<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// Route::get("/", [CategoryController::class, "index"]);
Route::get("/", [ProductController::class, "index"]);

Route::redirect("/products", "/products/category/all");
Route::redirect("/products/category", "/products/category/all");
Route::get("products/category/{type_slug}", [
    ProductController::class,
    "indexProduct",
]);

Route::get("/products/{slug}", [ProductController::class, "show"])->name(
    "product.product-detail.show",
);
