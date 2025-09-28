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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('title_1')->nullable();
            $table->string('sub_title_1')->nullable();
            $table->string('image_1')->nullable();
            
            $table->string('title_2')->nullable();
            $table->string('sub_title_2')->nullable();
            $table->string('image_2')->nullable();

            $table->string('title_3')->nullable();
            $table->string('sub_title_3')->nullable();
            $table->string('image_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
