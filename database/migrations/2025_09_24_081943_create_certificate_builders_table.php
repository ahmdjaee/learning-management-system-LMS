<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificate_builders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->string('background')->nullable();
            $table->string('signature')->nullable();

            // Position data for title
            $table->integer('title_x')->default(50); // percentage
            $table->integer('title_y')->default(150); // pixels
            $table->string('title_color')->default('#000000');

            // Position data for subtitle
            $table->integer('subtitle_x')->default(50); // percentage
            $table->integer('subtitle_y')->default(200); // pixels
            $table->string('subtitle_color')->default('#666666');

            // Position data for description
            $table->integer('description_x')->default(50); // percentage
            $table->integer('description_y')->default(350); // pixels
            $table->string('description_color')->default('#333333');

            // Position data for signature
            $table->integer('signature_x')->default(150); // pixels from right
            $table->integer('signature_y')->default(100); // pixels from bottom

            // Additional settings
            $table->boolean('show_grid')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_builders');
    }
};
