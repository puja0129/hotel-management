<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->json('items'); // array of strings
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('service_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('image_url');
            $table->string('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('service_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('label');
            $table->string('value');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('service_highlights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('highlight');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('service_footers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->text('text');
            $table->string('price');
            $table->string('cta_label');
            $table->string('cta_url')->default('#');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_footers');
        Schema::dropIfExists('service_highlights');
        Schema::dropIfExists('service_timings');
        Schema::dropIfExists('service_galleries');
        Schema::dropIfExists('service_sections');
    }
};
