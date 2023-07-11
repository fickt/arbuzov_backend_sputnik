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
        Schema::create('user_resort_ratings', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable(false);
            $table->bigInteger('resort_id')->nullable(false);
            $table->integer('rating')->default(0);
            $table->

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('resort_id')
                ->references('id')
                ->on('resorts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_resort_ratings');
    }
};
