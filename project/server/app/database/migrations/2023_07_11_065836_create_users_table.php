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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nickname', 255)->nullable(false)->unique();
            $table->string('first_name',255)->nullable(false);
            $table->string('last_name',255)->nullable(false);
            $table->string('email',255)->nullable(false)->unique();
            $table->string('password',255)->nullable(false);
            $table->boolean('is_blocked')->default(false);
            $table->bigInteger('role_id')->index()->nullable(false);

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
