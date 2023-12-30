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
        Schema::create('_level_scores', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("level_id")->constrained("levels");
            $table->integer("score")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_level_scores');
    }
};
