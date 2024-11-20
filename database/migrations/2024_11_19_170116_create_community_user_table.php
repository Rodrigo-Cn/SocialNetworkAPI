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
        Schema::create('community_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('community_id');
            $table->bigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('users')->on('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('community_id')->references('communities')->on('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_user');
    }
};
