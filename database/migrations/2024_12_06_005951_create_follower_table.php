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
        Schema::create('follower', function (Blueprint $table) {
            $table->unsignedBigInteger('user_followed');
            $table->unsignedBigInteger('user_follower');
            $table->id();
            $table->timestamps();

            $table->foreign('user_followed')->references('id')->on('users');
            $table->foreign('user_follower')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follower');
    }
};
