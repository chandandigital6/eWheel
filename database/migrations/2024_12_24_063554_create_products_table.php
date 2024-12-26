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
            $table->string('title')->nullable();
            $table->string(column: 'sub_title')->nullable();
            $table->string('sku_number')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('category_name')->nullable();
            $table->string('f_1')->nullable();
            $table->string('f_2')->nullable();
            $table->string('f_3')->nullable();
            $table->string('f_4')->nullable();
            $table->string('f_5')->nullable();
            $table->string('f_6')->nullable();
            $table->text('image')->nullable();
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
