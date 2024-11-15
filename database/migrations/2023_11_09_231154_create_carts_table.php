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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->longText('session_id')->nullable();
            $table->unsignedBigInteger('stock_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('shipping_charge')->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')
            ->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')
            ->on('customers')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')
            ->on('stocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
