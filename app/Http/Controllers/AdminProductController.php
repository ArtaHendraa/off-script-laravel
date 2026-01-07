<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("pages.admin.product-form", compact("categories"));
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
        $request->validate([
            "name" => "required|unique:products,name",
            "slug" => "required|unique:products,slug",
            "price" => "required|numeric",
            "sizes" => "required|array",
            "image" => "required|image|mimes:webp|max:2048",
            "description" => "required",
            "stock" => "required|integer|min:0",
            "category_id" => "required|exists:categories,id",
        ]);

        $path = $request->file("image")->store("products", "public");
        Product::create([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "sizes" => json_encode($request->sizes),
            "image" => $path,
            "description" => $request->description,
            "stock" => $request->stock,
            "category_id" => $request->category_id,
        ]);
        return redirect()
            ->route("admin.product.add")
            ->with("success", "Product created!");
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

    public function editList()
    {
        $products = Product::with("category")->latest()->get();
        return view("pages.admin.edit-product", compact("products"));
    }

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
            "name" => "required|unique:products,name",
            "slug" => "required|unique:products,slug",
            "price" => "required|numeric",
            "sizes" => "required|array",
            "description" => "required",
            "stock" => "required|integer|min:0",
        ]);

        $data["sizes"] = json_encode($data["sizes"]);

        $product->update($data);

        return redirect()
            ->route("admin.product.edit.list")
            ->with("success", "Product updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product = Product::where("slug", $slug)->firstOrFail();

        if (
            $product->image &&
            Storage::disk("public")->exists($product->image)
        ) {
            Storage::disk("public")->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route("admin.product.edit.list")
            ->with("success", "Product deleted!");
    }
}
