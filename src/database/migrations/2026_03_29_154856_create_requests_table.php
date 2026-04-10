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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('worker_service_id')->constrained('users')->cascadeOnDelete();
            $table->enum('type', ['admin', 'worker'])->default('worker');
            $table->enum('request_status', ['pending', 'accepted', 'rejected', 'completed'])->default('pending');
            $table->timestamp('requested_at')->nullable();
            $table->integer('points_spent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
