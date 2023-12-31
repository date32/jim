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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('machine_id')->references('id')->on('machines');
            $table->integer('minutes')->nullable();
            $table->integer('seconds')->nullable();
            $table->decimal('speed')->nullable();
            $table->decimal('distance')->nullable();
            $table->integer('strength')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('count')->nullable();
            $table->decimal('calorie')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
