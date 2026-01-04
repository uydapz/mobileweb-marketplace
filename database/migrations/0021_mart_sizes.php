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
        Schema::create('mart_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mart_id')->constrained('marts')->onDelete('cascade');
            $table->string('size', 50);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mart_sizes');
    }
};
