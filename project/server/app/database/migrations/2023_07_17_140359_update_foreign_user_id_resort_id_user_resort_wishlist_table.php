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
        Schema::table('user_resort_wishlist', function ($table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['resort_id']);
            
            $table->foreignId('user_id')->change();
            $table->foreignId('resort_id')->change();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->change();

            $table->foreign('resort_id')
                ->references('id')
                ->on('resorts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_resort_wishlist', function ($table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['resort_id']);

            $table->bigInteger('user_id')->change();
            $table->bigInteger('resort_id')->change();

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
};
