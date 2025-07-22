<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('tours', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->string('title'); // Tour title
        $table->string('slug')->unique(); // URL-friendly identifier (e.g. /tours/zanzibar-island)
        $table->string('image')->nullable(); // Path to uploaded image
        $table->text('description')->nullable(); // Short summary or overview of the tour
        $table->longText('paragraph')->nullable(); // Full detailed content
        $table->timestamps(); // created_at and updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
