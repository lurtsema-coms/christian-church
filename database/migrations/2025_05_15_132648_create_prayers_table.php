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
        Schema::create('prayers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('prayer_title');
            $table->string('name');
            $table->string('email');
            $table->string('prayer_category');
            $table->text('prayer_details');
            $table->boolean('is_approved')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayers');
    }
};
