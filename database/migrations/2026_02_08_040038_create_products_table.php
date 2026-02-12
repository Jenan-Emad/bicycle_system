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
            $table->string('img_url');
            $table->text('description');
            $table->integer('stock');
            $table->integer('sold_stock');
            $table->decimal('price',8, 2);
            $table->foreignId('category_id')->constraint('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constraint('brands')->onDelete('cascade');
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