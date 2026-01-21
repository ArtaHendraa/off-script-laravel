<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    public function exportExcel()
    {
        // ambil hanya order yang PAID (revenue valid)
        $orders = Order::where("status", "paid")->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue("A1", "ID Order");
        $sheet->setCellValue("B1", "User ID");
        $sheet->setCellValue("C1", "Total Revenue");
        $sheet->setCellValue("D1", "Payment Method");
        $sheet->setCellValue("E1", "Status");
        $sheet->setCellValue("F1", "Alamat");
        $sheet->setCellValue("G1", "Tanggal Order");

        $row = 2;
        foreach ($orders as $order) {
            $sheet->setCellValue("A" . $row, $order->id);
            $sheet->setCellValue("B" . $row, $order->user_id);
            $sheet->setCellValue("C" . $row, $order->total_price);
            $sheet->setCellValue("D" . $row, $order->payment_method);
            $sheet->setCellValue("E" . $row, $order->status);
            $sheet->setCellValue("F" . $row, $order->address);
            $sheet->setCellValue(
                "G" . $row,
                $order->created_at->format("Y-m-d H:i"),
            );
            $row++;
        }

        // Format kolom revenue jadi Rupiah
        $sheet
            ->getStyle("C2:C" . ($row - 1))
            ->getNumberFormat()
            ->setFormatCode('"Rp"#,##0');

        $writer = new Xlsx($spreadsheet);
        $fileName = "revenue-orders.xlsx";

        header(
            "Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        );
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        $writer->save("php://output");
        exit();
    }
}
