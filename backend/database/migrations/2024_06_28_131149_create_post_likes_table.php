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
        Schema::create('post_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_user_id')->constrained('profile_users')->onDelete('cascade');
            $table->foreignId('post_id')->constrained('user_posts')->onDelete('cascade');
            $table->foreignId('emoji_type_id')->constrained('emojis')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['profile_user_id', 'post_id']); // Ensure a user can only like a comment once
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_likes');
    }
};
