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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("doctor_id")->nullable()->constrained("doctors")->nullOnDelete();
            $table->foreignId("plan_id")->nullable()->constrained("plans")->nullOnDelete();
            $table->enum("type",["pending","staging","accepted","refused"])->default("pending");
            $table->string("receipt")->nullable();
            $table->integer("coupon_remaining")->nullable();
            $table->integer("posts_remaining")->nullable();
            $table->date("started_at")->nullable();
            $table->date("end_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
