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
        Schema::create('level_scores', function (Blueprint $table) {
            $table->foreignId("level_id")->constrained("levels");
            $table->foreignId("user_id")->constrained("users");
            $table->integer("score")->default(0);
            $table->boolean("unlocked")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_scores');
    }
};
