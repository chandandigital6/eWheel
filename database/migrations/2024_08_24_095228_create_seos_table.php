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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->enum('page', ['about', 'blog', 'contact','index','course','teacher',])->nullable();
            $table->text('description')->nullable();
            $table->string('canonical')->nullable();
            $table->string('og_locale')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('article_publisher')->nullable();
            $table->string('og_image')->nullable();
            $table->string('twitter_label1')->nullable();
            $table->string('twitter_data1')->nullable();
            $table->string('twitter_label2')->nullable();
            $table->string('twitter_data2')->nullable();
            $table->string('title')->nullable();
            $table->text('schema_js')->nullable();
            // $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
