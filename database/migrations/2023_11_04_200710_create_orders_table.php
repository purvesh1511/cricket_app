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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->string('variations')->nullable();
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('quantity');
            $table->string('fname');
            $table->string('lname');
            $table->longText('address_line_1');
            $table->longText('address_line_2')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code');
            $table->string('email');
            $table->string('phone');
            $table->longText('note')->nullable();
            $table->integer('shipping_charge')->default(0);
            $table->string('coupon_code')->nullable();
            $table->string('coupon_type')->nullable();
            $table->integer('coupon_discount_amount')->default(0);
            $table->string('status')->default('Processing');
            $table->string('payment_mode')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('shipped_at')->nullable();
            $table->string('delivered_at')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')
            ->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')
            ->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
