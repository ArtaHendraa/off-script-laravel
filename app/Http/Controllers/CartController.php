<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::with("category")->take(5)->get();
        return view("pages.cart.cart", compact("products"));
    }

    public function add(Product $product)
    {
        $cart = session()->get("cart", []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]["qty"]++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "qty" => 1,
                "image" => $product->image,
            ];
        }

        session(["cart" => $cart]);

        return redirect("/cart")->with("success", "Produk add to cart");
    }

    public function update(Request $request, $id)
    {
        $cart = session("cart");

        if ($request->action === "increase") {
            $cart[$id]["qty"]++;
        } else {
            $cart[$id]["qty"]--;
            if ($cart[$id]["qty"] <= 0) {
                unset($cart[$id]);
            }
        }

        session(["cart" => $cart]);
        return back();
    }

    public function remove($id)
    {
        $cart = session("cart");
        unset($cart[$id]);

        session(["cart" => $cart]);
        return back();
    }
}
