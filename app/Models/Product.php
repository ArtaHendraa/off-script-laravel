<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $guarded = ["id", "created_at", "best_seller", "updated_at"];
    protected $fillable = [
        "name",
        "slug",
        "price",
        "category_id",
        "sizes",
        "image",
        "description",
        "stock",
        // "best_seller",
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
    protected $casts = [
        "sizes" => "array",
        "description" => "array",
        "best_seller" => "boolean",
    ];
}
