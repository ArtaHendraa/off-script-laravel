<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        return view("pages.cart.checkout");
    }

    public function store(Request $request)
    {
        $request->validate([
            "address" => "required",
            "payment_method" => "required",
        ]);

        $cart = session("cart");

        if (!$cart || count($cart) === 0) {
            return redirect("/cart")->with("error", "Keranjang kosong");
        }

        DB::transaction(function () use ($cart, $request, &$order) {
            $total = collect($cart)->sum(
                fn($item) => $item["price"] * $item["qty"],
            );

            $order = Order::create([
                "user_id" => auth()->id(),
                "total_price" => $total,
                "payment_method" => $request->payment_method,
                "address" => $request->address,
                "status" => "paid",
            ]);

            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    "order_id" => $order->id,
                    "product_id" => $productId,
                    "qty" => $item["qty"],
                    "price" => $item["price"],
                ]);

                Product::where("id", $productId)->decrement(
                    "stock",
                    $item["qty"],
                );
            }
        });

        session()->forget("cart");

        return redirect()->route("order.invoice", $order->id);
    }
}
