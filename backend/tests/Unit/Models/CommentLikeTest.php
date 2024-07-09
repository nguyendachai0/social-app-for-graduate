<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\CommentLike;
use App\Models\PostComment;
use App\Models\ProfileUser;
use App\Models\UserPost;
use App\Models\Emoji;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentLikeTest extends TestCase
{
    use RefreshDatabase;
    private $commentLike;
    protected function setUp(): void
    {
        parent::setUp();
        $userCreatedPost = ProfileUser::factory()->create();
        $userPost = UserPost::factory()->create([
            'profile_user_id'  => $userCreatedPost->id
        ]);
        $userCommented =  ProfileUser::factory()->create();

        $postComment = PostComment::factory()->create([
            'profile_user_id' => $userCommented->id,
            'post_id' => $userPost->id
        ]);

        $emoji = Emoji::factory()->create();

        $userLikeComment = ProfileUser::factory()->create();
        $this->commentLike = CommentLike::factory()->create([
            'profile_user_id' => $userLikeComment->id,
            'comment_id' => $postComment->id,
            'emoji_type_id' => $emoji->id
        ]);
    }
    public function testItBelongsToProfileUser()
    {
        $this->assertInstanceOf(ProfileUser::class, $this->commentLike->profile);
    }

    public function testItBelongsToPostComment()
    {

        $this->assertInstanceOf(PostComment::class, $this->commentLike->comment);
    }
}
