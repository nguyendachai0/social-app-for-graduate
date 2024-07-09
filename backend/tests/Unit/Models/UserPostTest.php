<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\UserPost;
use App\Models\ProfileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_profile_user()
    {
        $userPost = UserPost::factory()->create();
        $this->assertInstanceOf(ProfileUser::class, $userPost->profileUser);
    }
}
