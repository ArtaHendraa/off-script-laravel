<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::where("status", "paid")->sum("total_price");
        $thisMonth = Order::where("status", "paid")
            ->whereMonth("created_at", now()->month)
            ->whereYear("created_at", now()->year)
            ->sum("total_price");
        $lastMonth = Order::where("status", "paid")
            ->whereMonth("created_at", now()->subMonth()->month)
            ->whereYear("created_at", now()->subMonth()->year)
            ->sum("total_price");
        $growth =
            $lastMonth > 0
                ? round((($thisMonth - $lastMonth) / $lastMonth) * 100, 1)
                : 0;

        $totalCustomer = User::where("role", "user")->count();
        $totalOrders = Order::where("status", "paid")->count();

        $products = Product::with("category")->latest()->get();
        $productChartData = $products
            ->groupBy(fn($item) => $item->category->name ?? "Tanpa Kategori")
            ->map(fn($group) => $group->count());

        return view(
            "pages.admin.dashboard",
            compact(
                "products",
                "productChartData",
                "totalRevenue",
                "growth",
                "totalCustomer",
                "totalOrders",
            ),
        );
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
}
