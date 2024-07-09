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
        Schema::create('post_comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment_content')->nullable();
            $table->string('media')->nullable();
            $table->foreignId('profile_user_id')->constrained('profile_users')->onDelete('cascade');
            $table->foreignId('post_id')->constrained('user_posts')->onDelete('cascade');
            $table->foreignId('parent_comment_id')->nullable()->constrained('post_comments')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_comments');
    }
};
