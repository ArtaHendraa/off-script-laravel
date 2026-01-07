<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::with("category")->latest()->get();

        $shirts = Product::with("category")
            ->whereHas("category", fn($q) => $q->where("slug", "shirts"))
            ->get();

        $hoodieSweater = Product::with("category")
            ->whereHas(
                "category",
                fn($q) => $q->where("slug", "hoodie-or-sweater"),
            )
            ->get();

        $accessories = Product::with("category")
            ->whereHas(
                "category",
                fn($q) => $q->where("slug", "accessories-and-others"),
            )
            ->get();

        return view(
            "index",
            compact("products", "shirts", "hoodieSweater", "accessories"),
        );
    }

    public function showByCategory($category_slug)
    {
        if ($category_slug === "all") {
            $products = Product::with("category")->get();
            $category = null;
        } else {
            $products = Product::with("category")
                ->whereHas(
                    "category",
                    fn($q) => $q->where("slug", $category_slug),
                )
                ->get();

            $category = $products->first()?->category;
        }

        return view("pages.product.product", [
            "products" => $products,
            "category" => $category,
            "category_slug" => $category_slug,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $products = Product::with("category")->get();

        $product = Product::with("category")->where("slug", $slug)->first();
        if (!$product) {
            abort(404, "Produk tidak ditemukan");
        }
        return view(
            "pages.product.product-detail",
            compact("product", "products"),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
