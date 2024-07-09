<?php

namespace Database\Factories;

use App\Models\CommentLike;
use App\Models\ProfileUser;
use App\Models\PostComment;
use App\Models\Emoji;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentLikeFactory extends Factory
{
    protected $model = CommentLike::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_user_id' => ProfileUser::factory(),
            'comment_id' => PostComment::factory(),
            'emoji_type_id' => Emoji::factory(),
        ];
    }
}
