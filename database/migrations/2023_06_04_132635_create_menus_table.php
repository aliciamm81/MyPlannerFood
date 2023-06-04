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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('dia');
            $table->integer('id_recipe_breakfast');
            $table->string('name_breakfast');
            $table->integer('id_recipe_lunch');
            $table->string('name_lunch');
            $table->integer('id_recipe_snack');
            $table->string('name_snack');
            $table->integer('id_recipe_dinner');
            $table->string('name_dinner');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
