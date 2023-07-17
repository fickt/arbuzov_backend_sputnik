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
        Schema::table('resort_category', function ($table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['resort_id']);

            $table->foreignId('category_id')->change();
            $table->foreignId('resort_id')->change();

            $table->foreign('category_id')
                ->references('id')
                ->on('resort_categories')
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
        Schema::table('resort_category', function ($table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['resort_id']);

            $table->bigInteger('category_id')->change();
            $table->bigInteger('resort_id')->change();

            $table->foreign('category_id')
                ->references('id')
                ->on('resort_categories')
                ->cascadeOnDelete()
                ->change();

            $table->foreign('resort_id')
                ->references('id')
                ->on('resorts')
                ->cascadeOnDelete()
                ->change();
        });
    }
};
