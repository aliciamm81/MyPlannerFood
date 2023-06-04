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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('recipe_name');
            $table->string('recipe_description');
            $table->string('ingredient');
            $table->string('steps');
            $table->integer('time');
            $table->integer('calories');
            $table->integer('carbohydrate');
            $table->integer('fat');
            $table->integer('protein');
            $table->string('recipe_image');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
