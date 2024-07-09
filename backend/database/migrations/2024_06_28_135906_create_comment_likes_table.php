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
        Schema::create('comment_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_user_id')->constrained('profile_users')->onDelete('cascade');
            $table->foreignId('comment_id')->constrained('post_comments')->onDelete('cascade');
            $table->foreignId('emoji_type_id')->constrained('emojis')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['profile_user_id', 'comment_id']); // Ensure a user can only like a comment once
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_likes');
    }
};
