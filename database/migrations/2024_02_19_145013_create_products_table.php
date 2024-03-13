<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('product_category_id')->constrained('product_categories')->onDelete('cascade');
            $table->text('desc');
            $table->text('ingredient');
            $table->text('caution');
            $table->unsignedDecimal('price', 10, 2);
            $table->text('link_tokped')->nullable();
            $table->text('link_shopee')->nullable();
            $table->text('link_tiktok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
