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
        Schema::create('food_products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description', 200);
            $table->decimal('cost', 8, 2);
            $table->boolean('is_active');
            $table->boolean('is_finalized');
            $table->boolean('is_published');
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('model_has_category');
        });

        Schema::create('food_products_detail', function(Blueprint $table){
            $table->id();
            $table->string('description', 255);
            $table->decimal('cost', 8, 2);
            $table->integer('quantity');

            $table->foreignId('food_product_id')->constrained('food_products');
        });

        Schema::create('food_product_orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('unit_price', 8, 2);
            $table->decimal('total_order_price', 8, 2);
            $table->integer('total');
            $table->boolean('is_paid');
            $table->timestamps();

            $table->foreignId('food_product_id')->constrained('food_products');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('delivery_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
