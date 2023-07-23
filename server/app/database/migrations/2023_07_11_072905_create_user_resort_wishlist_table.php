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
        Schema::create('user_resort_wishlist', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable(false);
            $table->bigInteger('resort_id')->nullable(false);
            $table->dateTime('visit_date');

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
        Schema::dropIfExists('user_resort_wishlist');
    }
};
