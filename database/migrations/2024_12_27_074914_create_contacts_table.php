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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('con_title')->nullable();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string(column:'open_time')->nullable();
            $table->text('map_url')->nullable();
            $table->string('fb_url')->nullable();
            $table->string(column: 'insta_url')->nullable();
            $table->string(column: 'wtsapp_url')->nullable();
            $table->string('twi_url')->nullable();
            $table->string('you_url')->nullable();
            $table->string('other_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
