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
    Schema::create('packages', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('location');
        $table->string('category');
        $table->string('image');
        $table->string('price_per_day')->nullable();
        $table->string('discount')->nullable();
        $table->text('short_description')->nullable();
        $table->longText('detailed_description')->nullable(); // for detail page
        $table->string('detail_image')->nullable(); // image used in detail
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
