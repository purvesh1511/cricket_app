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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('title');
            $table->string('sku')->nullable();
            $table->longText('description');
            $table->boolean('status')->default(1);
            $table->bigInteger('priority')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')
            ->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')
            ->on('sub_categories')->onDelete('cascade');
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
