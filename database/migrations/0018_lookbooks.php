<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lookbooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');               // Judul Lookbook
            $table->string('slug')->unique();      // Slug otomatis
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable(); // Cover image
            $table->tinyInteger('period_month');  // Bulan, 1-12
            $table->smallInteger('period_year');  // Tahun
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lookbooks');
    }
};
