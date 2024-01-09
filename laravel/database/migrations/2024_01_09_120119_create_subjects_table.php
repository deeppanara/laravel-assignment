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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->date('date_of_birth');
            $table->enum('headache_frequency', ['Monthly', 'Weekly', 'Daily']);
            $table->enum('daily_headache_frequency', ['1-2', '3-4', '5+'])->nullable();
            $table->string('eligibility')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
