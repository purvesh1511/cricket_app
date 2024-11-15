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
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->longText('page_description');
            $table->string('page_image');
            $table->enum('page_type', ['legal', 'informatic']);
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->longText('meta_description');
            $table->enum('page_status', ['active', 'trash', 'p-delete']);
            $table->string('slug')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('page_published')->nullable();
            $table->timestamp('page_modified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms');
    }
};
