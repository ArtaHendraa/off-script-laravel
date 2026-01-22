<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("pages.admin.product-form", compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "slug" => "required",
            "price" => "required|numeric",
            "sizes" => "required|array",
            "image" => "required|image|mimes:webp",
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
            ->route("admin.product.list")
            ->with("success", "Product created!");
    }

    public function productsList()
    {
        $products = Product::with("category")->latest()->paginate(8);
        return view("pages.admin.products", compact("products"));
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

    public function update(Request $request, string $slug)
    {
        // dd($request->all());

        $product = Product::where("slug", $slug)->firstOrFail();
        $data = $request->validate([
            "name" => "required",
            "slug" => "required",
            "price" => "required|numeric",
            "sizes" => "required|array",
            "description" => "required",
            "stock" => "required|integer|min:0",
        ]);

        $data["sizes"] = json_encode($data["sizes"]);

        $product->update($data);

        return redirect()
            ->route("admin.product.list")
            ->with("success", "Product updated!");
    }

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
            ->route("admin.product.list")
            ->with("success", "Product deleted!");
    }
}
