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
        Schema::create('rooms', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('image'); // e.g., room-1.jpg
    $table->decimal('price', 8, 2);
    $table->integer('stars')->default(5);
    $table->integer('bed_count');
    $table->integer('bath_count');
    $table->boolean('wifi')->default(true);
    $table->text('description');
    $table->boolean('is_available')->default(true);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
