<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pending_chat_deletions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user1_id'); // initiator
            $table->unsignedBigInteger('user2_id'); // other user
            $table->boolean('user1_rated')->default(false);
            $table->boolean('user2_rated')->default(false);
            $table->timestamps();
            $table->unique(['user1_id', 'user2_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pending_chat_deletions');
    }
};
