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
    Schema::create('slides', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();
        $table->string('subtitle')->nullable();
        $table->text('description')->nullable();
        $table->string('image'); // URL or path
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
