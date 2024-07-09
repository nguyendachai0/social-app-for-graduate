<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\PostLike;
use App\Models\UserPost;
use App\Models\ProfileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostLikeTest extends TestCase
{
    use RefreshDatabase;

    public function testItBelongsToProfileUser()
    {
        $postLike = PostLike::factory()->create();
        $this->assertInstanceOf(ProfileUser::class, $postLike->profileUser);
    }

    public function testItBelongsToUserPost()
    {
        $postLike = PostLike::factory()->create();
        $this->assertInstanceOf(UserPost::class, $postLike->userPost);
    }
}
