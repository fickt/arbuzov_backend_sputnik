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
        Schema::create('resort_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('resort_id');
            $table->string('photo');

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
        Schema::dropIfExists('resort_photos');
    }
};
