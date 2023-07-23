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
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_slug');
            $table->integer('product_quantity');
            $table->float('selling_price');
            $table->float('discount_price');
            $table->text('description')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->softDeletes();
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
