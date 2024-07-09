<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Share;
use App\Models\UserPost;
use App\Models\ProfileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShareTest extends TestCase
{
    use RefreshDatabase;

    public function testItBelongsToUserPost()
    {
        $share = Share::factory()->create();
        $this->assertInstanceOf(UserPost::class, $share->userPost);
    }

    public function testItbelongsToProfileUser()
    {
        $share = Share::factory()->create();
        $this->assertInstanceOf(ProfileUser::class, $share->profileUser);
    }
}
