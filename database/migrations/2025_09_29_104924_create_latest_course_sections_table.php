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
        Schema::create('latest_course_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_1')->nullable();
            $table->foreignId('category_2')->nullable();
            $table->foreignId('category_3')->nullable();
            $table->foreignId('category_4')->nullable();
            $table->foreignId('category_5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_course_sections');
    }
};
