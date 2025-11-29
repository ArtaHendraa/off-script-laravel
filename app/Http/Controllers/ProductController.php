<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function ujiInsert(){
        
    }
    public $products = [
        [
            "id" => 1,
            "name" => "Fully Embroidered Sweater",
            "slug" => "fully-embroidered-sweater",
            "price" => 1015000,
            "type" => "Hoodie / Sweater",
            "type_slug" => "hoodie-or-sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/14.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 15,000 threads",
                    "Warm, comfortable, and breathable material designed for year-round wear",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Green",
                ],
            ],
            "stock" => 22,
            "best_seller" => true,
        ],

        [
            "id" => 2,
            "name" => "T-Shirt - Aira & Scrambled Egg Recipe",
            "slug" => "t-shirt-aira-and-scrambled-egg-recipe",
            "price" => 229000,
            "type" => "Shirts",
            "type_slug" => "shirts",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/2.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Made from 100% organic cotton.",
                    "T-Shirt is breathable and lightweight.",
                    "Oversized for Maximum Comfort.",
                    "The sizes are tailored for an oversized look.",
                    "Perfect for a casual, relaxed, and effortless style.",
                    "Color: White",
                ],
            ],
            "stock" => 0,
            "best_seller" => false,
        ],

        [
            "id" => 3,
            "name" => "White Short Sleeve Collar Shirt - Aira No.2",
            "slug" => "white-short-sleeve-collar-shirt-aira-no-2",
            "price" => 350000,
            "type" => "Shirts",
            "type_slug" => "shirts",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/3.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Short Sleeve Oversized for Maximum Comfort.",
                    "Perfect for a casual, relaxed, and effortless style.",
                    "Polyester.",
                    "Color: White.",
                ],
            ],
            "stock" => 25,
            "best_seller" => false,
        ],

        [
            "id" => 4,
            "name" => "Red Beanie",
            "slug" => "red-beanie",
            "price" => 318000,
            "type" => "Accessories & Others",
            "type_slug" => "accessories-and-others",
            "sizes" => ["One Size"],
            "image" => "/product_image/4.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Stretchy and comfortable so it fits almost everyone.",
                    "Will keep you warm throughout winter.",
                    "Stylish embroidery that goes with every outfit.",
                    "Color: Red",
                ],
            ],
            "stock" => 25,
            "best_seller" => false,
        ],

        [
            "id" => 5,
            "name" => "Black Long-Sleeve Collar Shirt",
            "slug" => "black-long-sleeve-collar-shirt",
            "price" => 356000,
            "type" => "Shirts",
            "type_slug" => "shirts",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/5.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Perfect for layering.",
                    "Light and soft.",
                    "Polyester.",
                    "Color: Black",
                ],
            ],
            "stock" => 25,
            "best_seller" => true,
        ],

        [
            "id" => 6,
            "name" => "T-Shirt - Her Smallest Thought",
            "slug" => "fully-embroidered-sweater",
            "price" => 229000,
            "type" => "Shirts",
            "type_slug" => "shirts",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/6.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Made from 100% organic cotton.",
                    "T-Shirt is breathable and lightweight.",
                    "Oversized for Maximum Comfort.",
                    "The sizes are tailored for an oversized look.",
                    "Perfect for a casual, relaxed, and effortless style.",
                    "Color: Sand / Beige.",
                ],
            ],
            "stock" => 25,
            "best_seller" => true,
        ],

        [
            "id" => 7,
            "name" => "Original Tote Bag",
            "slug" => "original-tote-bag",
            "price" => 311000,
            "type" => "Accessories & Others",
            "type_slug" => "accessories-and-others",
            "sizes" => ["40 x 35 x 10 cm"],
            "image" => "/product_image/7.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Made from durable canvas: thick enough for long-lasting use, yet soft for comfort",
                    "Small interior pocket for extra storage.",
                    "What fits inside: your computer, phone, keys, Aira Plushy, books, etc.",
                    "Color: White",
                ],
            ],
            "stock" => 25,
            "best_seller" => true,
        ],

        [
            "id" => 8,
            "name" => "Aira Plushie + glasses",
            "slug" => "aira-plushie-and-glasses",
            "price" => 623000,
            "type" => "Accessories & Others",
            "type_slug" => "accessories-and-others",
            "sizes" => ["Plushy + Glasses"],
            "image" => "/product_image/8.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Made from 100% cotton, this plushy comes with an exclusive OFF SCRIPT canvas bag.",
                    "Size: 14 x 9 x 5 in / 35 x 22 x 12 cm",
                    "Wooden box and OFF SCRIPT tote bag are not included.",
                ],
            ],
            "stock" => 25,
            "best_seller" => true,
        ],

        [
            "id" => 9,
            "name" => "Limited Edition - White Sweater",
            "slug" => "limited-edition-white-sweater",
            "price" => 1099000,
            "type" => "Hoodie / Sweater",
            "type_slug" => "hoodie-or-sweater",
            "sizes" => ["M", "L", "XL", "XXL"],
            "image" => "/product_image/9.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Warm, comfortable, and breathable material designed for year-round wear.",
                    "Perfect mix of 20% recycled polyester and 80% cotton with polar fleece to create a 3D effect.",
                    "No restock for limited edition.",
                    "Color: White",
                ],
            ],
            "stock" => 0,
            "best_seller" => false,
        ],

        [
            "id" => 10,
            "name" => "The Aira Blueprint Hoodie",
            "slug" => "the-aira-blueprint-hoodie",
            "price" => 1015000,
            "type" => "Hoodie / Sweater",
            "type_slug" => "hoodie-or-sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/10.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "FFully embroidered with 12,000 threads",
                    "Made from warm and breathable material, perfect for year-round wear.",
                    "Oversized hood and relaxed fit for ultimate comfort and style.",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect",
                    "Color: Sand beige",
                ],
            ],
            "stock" => 33,
            "best_seller" => true,
        ],

        [
            "id" => 11,
            "name" => "Beanie",
            "slug" => "beanie",
            "price" => 318000,
            "type" => "Accessories & Others",
            "type_slug" => "accessories-and-others",
            "sizes" => ["One Size"],
            "image" => "/product_image/11.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Stretchy and comfortable so it fits almost everyone.",
                    "Will keep you warm throughout winter.",
                    "Stylish embroidery that goes with every outfit.",
                    "Color: Black",
                ],
            ],
            "stock" => 50,
            "best_seller" => true,
        ],

        [
            "id" => 12,
            "name" => "Limited Edition - Scarf",
            "slug" => "limited-edition-scarf",
            "price" => 350000,
            "type" => "Accessories & Others",
            "type_slug" => "accessories-and-others",
            "sizes" => ["200 x 70 cm"],
            "image" => "/product_image/12.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Soft and comfortable made with durable mix of poly and cotton.",
                    "Oversized scarf, fold and make multiple layers to keep you warm!",
                    "Black with quality embroidery, goes with every style.",
                    "Color: Black",
                ],
            ],
            "stock" => 0,
            "best_seller" => false,
        ],

        [
            "id" => 13,
            "name" => "Black Short Sleeve Collar Shirt - Aira No.3",
            "slug" => "black-short-sleeve-collar-shirt-aira-no-3",
            "price" => 305000,
            "type" => "Shirts",
            "type_slug" => "shirts",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/13.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Short Sleeve Oversized for Maximum Comfort",
                    "Perfect for a casual, relaxed, and effortless style.",
                    "Polyester.",
                    "Color: Black",
                ],
            ],
            "stock" => 38,
            "best_seller" => false,
        ],

        [
            "id" => 14,
            "name" => "Black Hoodie",
            "slug" => "black-hoodie",
            "price" => 1015000,
            "type" => "Hoodie / Sweater",
            "type_slug" => "hoodie-or-sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/1.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 14,000 threads.",
                    "Made from warm and breathable material, perfect for year-round wear.",
                    "Oversized hood and relaxed fit for ultimate comfort and style.",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Black",
                ],
            ],
            "stock" => 15,
            "best_seller" => true,
        ],

        [
            "id" => 15,
            "name" => "OFFSCRIPT Lazy Cat Hoodie",
            "slug" => "offscript-lazy-cat-hoodie",
            "price" => 1015000,
            "type" => "Hoodie / Sweater",
            "type_slug" => "hoodie-or-sweater",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/15.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Fully embroidered with 13,000 threads.",
                    "Made from warm and breathable material, perfect for year-round wear.",
                    "Oversized hood and relaxed fit for ultimate comfort and style.",
                    "Half velvet, half cotton, with a polar fleece interior for a unique 3D effect.",
                    "Color: Dark Grey",
                ],
            ],
            "stock" => 10,
            "best_seller" => true,
        ],

        [
            "id" => 16,
            "name" => "Black T-Shirt",
            "slug" => "black-t-shirt",
            "price" => 305000,
            "type" => "Shirts",
            "type_slug" => "shirts",
            "sizes" => ["S", "M", "L", "XL", "XXL"],
            "image" => "/product_image/16.webp",
            "description" => [
                "intro" => "A classic piece of the OFF SCRIPT Collection :D",
                "details" => [
                    "Oversized for Maximum Comfort - The sizes are tailored for an oversized look, perfect for a casual, relaxed, and effortless style",
                    "Color: Black",
                ],
            ],
            "stock" => 39,
            "best_seller" => false,
        ],
    ];

    public function index()
    {
        $products = $this->products;
        // $products = collect($this->products);
        $hoodieSweater = collect($products)->where("type", "Hoodie / Sweater");
        $shirts = collect($products)->where("type", "Shirts");
        $accessories = collect($products)->where(
            "type",
            "Accessories & Others",
        );

        return view(
            "index",
            compact("products", "hoodieSweater", "shirts", "accessories"),
        );
    }

    public function indexProduct($type_slug)
    {
        $products = collect($this->products);

        $filtered =
            $type_slug !== "all"
                ? $products->where("type_slug", $type_slug)
                : $products;

        $type =
            $type_slug !== "all" ? $filtered->first()["type"] ?? null : null;

        return view("product.product", [
            "products" => $filtered,
            "type" => $type,
            "type_slug" => $type_slug,
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
