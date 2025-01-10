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
        Schema::create('reviewforums', function (Blueprint $table) {
            $table->id();
            $table->longText("name");
            $table->longText("review");
            $table->longText("twitter")->nullable();
            $table->longText("instagram")->nullable();
            $table->longText("gamejolt")->nullable();
            $table->longText("reddit")->nullable();
            $table->longText("discord")->nullable();
            $table->longText("tiktok")->nullable();
            $table->longText("video")->nullable();
            $table->longText("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review-forums');
    }
};
