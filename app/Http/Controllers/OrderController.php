<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function invoice(Order $order)
    {
        $order->load("items.product", "user");

        $pdf = Pdf::loadView("doc.pdf.invoice", compact("order"));

        return $pdf->stream("struk-{$order->id}.pdf");
    }
}
