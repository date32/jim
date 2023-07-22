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
        Schema::create('machine_for_training_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->references('id')->on('machines');
            $table->foreignId('training_area_id')->references('id')->on('training_areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_for_training_areas');
    }
};
