<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Store Page
Route::get("/", [ProductController::class, "index"]);

Route::redirect("/products", "/products/category/all");
Route::redirect("/products/category", "/products/category/all");
Route::get("products/category/{type_slug}", [
    ProductController::class,
    "showByCategory",
]);
Route::get("/products/{slug}", [ProductController::class, "show"])->name(
    "product.product-detail.show",
);

//! Admin Page
Route::get("/admin", [AdminController::class, "index"]);

//! Store Product
Route::get("/admin/product/add", [
    AdminProductController::class,
    "index",
])->name("admin.product.add");
Route::post("/admin/product/add", [
    AdminProductController::class,
    "store",
])->name("admin.product.store");

//! Edit Product
Route::get("/admin/product/edit", [
    AdminProductController::class,
    "editList",
])->name("admin.product.edit.list");
Route::get("/admin/product/edit/{slug}", [
    AdminProductController::class,
    "edit",
])->name("admin.product.edit");
Route::put("/admin/product/edit/{slug}", [
    AdminProductController::class,
    "update",
])->name("admin.product.update");

//! Delete Product
Route::delete("/admin/product/destroy/{slug}", [
    AdminProductController::class,
    "destroy",
])->name("admin.product.destroy");

//! Store Category
Route::get("/admin/category/add", [
    AdminCategoryController::class,
    "index",
])->name("admin.category.add");
Route::post("/admin/category/add", [
    AdminCategoryController::class,
    "store",
])->name("admin.category.store");

//! Edit Category
Route::get("/admin/category/edit", [
    AdminCategoryController::class,
    "editList",
])->name("admin.category.edit.list");
Route::get("/admin/category/edit/{slug}", [
    AdminCategoryController::class,
    "edit",
])->name("admin.category.edit");
Route::post("/admin/category/edit/{slug}", [
    AdminCategoryController::class,
    "update",
])->name("admin.category.update");

//! Delete Category
Route::delete("/admin/cetegory/destroy/{slug}", [
    AdminCategoryController::class,
    "destroy",
])->name("admin.cetegory.destroy");
