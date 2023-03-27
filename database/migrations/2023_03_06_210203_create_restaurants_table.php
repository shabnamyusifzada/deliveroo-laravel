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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('img_url');
            $table->string('name', 100);
            $table->string('short_description');
            $table->text('description');
            $table->string('address', 100);
            $table->string('latitude', 20);
            $table->string('longitude', 20);
            $table->unsignedFloat('rating')->default(0);
            $table->boolean('status')->default(1);
            $table->foreignId('genre_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
