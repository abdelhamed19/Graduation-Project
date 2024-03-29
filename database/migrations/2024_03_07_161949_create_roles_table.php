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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['super-admin', 'admin', 'user','doctor'])->default('user');
            $table->foreignId('user_id')->nullable()->constrained("users")->nullOnDelete();
            $table->foreignId('doctor_id')->nullable()->constrained("doctors")->nullOnDelete();
            $table->string('username')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
