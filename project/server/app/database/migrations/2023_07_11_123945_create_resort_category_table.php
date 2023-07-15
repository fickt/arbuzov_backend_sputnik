<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * intermediate table for many-to-many
 * resorts >--< categories
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resort_category', function (Blueprint $table) {
            $table->bigInteger('resort_id');
            $table->bigInteger('category_id');

            $table->foreign('resort_id')
                ->references('id')
                ->on('resorts')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('resort_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resort_category');
    }
};
