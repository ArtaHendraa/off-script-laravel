<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use FontLib\Table\Type\name;

//! Auth
Route::get("/login", [AuthController::class, "indexLogin"])
    ->name("login")
    ->middleware("loggedin");
Route::post("/login", [AuthController::class, "login"])->name(
    "auth.login.store",
);
Route::get("/register", [AuthController::class, "indexRegister"])
    ->name("register")
    ->middleware("loggedin");
Route::post("/register", [AuthController::class, "register"])->name(
    "auth.register.store",
);
Route::post("/logout", [AuthController::class, "logout"])
    ->name("logout")
    ->middleware("auth");

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

Route::get("/order/{order}/invoice", [OrderController::class, "invoice"])
    ->middleware("auth")
    ->name("order.invoice");

// profile
Route::get("/profile", [ProfileController::class, "index"])
    ->name("profile")
    ->middleware("auth");

//! Cart
Route::get("/cart", [CartController::class, "index"])
    ->name("cart")
    ->middleware("auth");
Route::post("/cart/add/{product}", [CartController::class, "add"])
    ->middleware("auth")
    ->name("cart.add");
Route::post("/cart/update/{id}", [CartController::class, "update"]);
Route::post("/cart/remove/{id}", [CartController::class, "remove"]);
Route::get("/checkout", [CheckoutController::class, "index"])
    ->middleware("auth")
    ->name("checkout.index");

Route::post("/checkout", [CheckoutController::class, "store"])
    ->middleware("auth")
    ->name("checkout.store");

//! Admin Page
Route::get("/admin", [AdminController::class, "index"])
    ->middleware("auth", "role:admin,god")
    ->name("admin.index");
Route::get("/export-revenue", [AdminController::class, "exportExcel"])
    ->name("export.revenue")
    ->middleware("auth", "role:admin,god");

//! Edit Product
Route::get("/admin/product", [AdminProductController::class, "productsList"])
    ->name("admin.product.list")
    ->middleware("auth", "role:admin,god");
Route::get("/admin/product/edit/{slug}", [
    AdminProductController::class,
    "edit",
])
    ->name("admin.product.edit")
    ->middleware("auth", "role:admin,god");
Route::put("/admin/product/edit/{slug}", [
    AdminProductController::class,
    "update",
])
    ->name("admin.product.update")
    ->middleware("auth", "role:admin,god");

//! Add Product
Route::get("/admin/product/add", [AdminProductController::class, "index"])
    ->name("admin.product.add")
    ->middleware("auth", "role:admin,god");
Route::post("/admin/product/add", [AdminProductController::class, "store"])
    ->name("admin.product.store")
    ->middleware("auth", "role:admin,god");

//! Delete Product
Route::delete("/admin/product/destroy/{slug}", [
    AdminProductController::class,
    "destroy",
])
    ->name("admin.product.destroy")
    ->middleware("auth", "role:admin,god");

//! Store Category
Route::get("/admin/category/add", [AdminCategoryController::class, "index"])
    ->name("admin.category.add")
    ->middleware("auth", "role:admin,god");
Route::post("/admin/category/add", [AdminCategoryController::class, "store"])
    ->name("admin.category.store")
    ->middleware("auth", "role:admin,god");

//! Edit Category
Route::get("/admin/category", [AdminCategoryController::class, "editList"])
    ->name("admin.category.edit.list")
    ->middleware("auth", "role:admin,god");
Route::get("/admin/category/edit/{slug}", [
    AdminCategoryController::class,
    "edit",
])
    ->name("admin.category.edit")
    ->middleware("auth", "role:admin,god");
Route::post("/admin/category/edit/{slug}", [
    AdminCategoryController::class,
    "update",
])
    ->name("admin.category.update")
    ->middleware("auth", "role:admin,god");

//! Delete Category
Route::delete("/admin/cetegory/destroy/{slug}", [
    AdminCategoryController::class,
    "destroy",
])
    ->name("admin.cetegory.destroy")
    ->middleware("auth", "role:admin,god");
