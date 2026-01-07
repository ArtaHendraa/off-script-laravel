<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("products", function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("slug")->unique();
            $table->integer("price");
            $table->json("sizes");
            $table->string("image");
            $table->json("description");
            $table->integer("stock");
            $table->boolean("best_seller")->default(0);

            $table
                ->foreignId("category_id")
                ->constrained("categories")
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("products");
    }
};
