<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with("category")->latest()->get();
        return view("pages.admin.dashboard", compact("products"));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product = Product::where("slug", $slug)->firstOrFail();
        $categories = Category::all();
        return view(
            "pages.admin.product-form",
            compact("product", "categories"),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $product = Product::where("slug", $slug)->firstOrFail();
        $data = $request->validate([
            "name" => "required|string|max:255",
            "slug" => "required|string|max:255",
            "price" => "required|numeric|min:0",
            "stock" => "required|integer|min:0",
            "category_id" => "required|exists:categories,id",
            "description" => "required|string",
        ]);

        $data["sizes"] = json_encode($request->sizes ?? []);

        $product->update($data);

        return back()->with("success", "Product updated!");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
