<?php

namespace Database\Factories;

use App\Models\PostLike;
use App\Models\ProfileUser;
use App\Models\UserPost;
use App\Models\Emoji;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostLikeFactory extends Factory
{
    protected $model = PostLike::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_user_id' => ProfileUser::factory(),
            'post_id' => UserPost::factory(),
            'emoji_type_id' => Emoji::factory()->create()->id, 
        ];
    }
}
