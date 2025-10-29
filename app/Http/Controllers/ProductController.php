<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $products = [
        [
            "id" => 1,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 2,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 3,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 4,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 5,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 6,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 7,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 8,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 9,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
        [
            "id" => 10,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.jpg",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
        ],
    ];

    public function index()
    {
        $products = $this->products;
        return view("index", compact("products"));
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
        $product = collect($this->products)->firstWhere("slug", $slug);
        if (!$product) {
            abort(404, "Produk tidak ditemukan");
        }
        return view("product.product-detail", compact("product"));
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
