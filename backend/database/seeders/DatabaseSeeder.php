<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        // ProfileUserSeeder::class,
        // EmojiSeeder::class,
        UserPostSeeder::class,
        ShareSeeder::class,
        PostCommentSeeder::class,
        // ConversationSeeder::class,
        // PostLikeSeeder::class,
        // FriendRequestSeeder::class,
        // NotificationSeeder::class,
        // ParticipantSeeder::class,
        // CommentLikeSeeder::class,
        // StorySeeder::class
        // MessageSeeder::class
    ]);
    }
}
