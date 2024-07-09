<?php

namespace Database\Factories;

use App\Models\PostComment;
use App\Models\ProfileUser;
use App\Models\UserPost;
use App\Models\Emoji;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentFactory extends Factory
{
    protected $model = PostComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment_content' => $this->faker->sentence,
            'media' => $this->faker->imageUrl(),
            'profile_user_id' => ProfileUser::factory(),
            'post_id' => UserPost::factory(),
            'parent_comment_id' => null, // Assuming it's nullable and starts as null
        ];
    }
}
