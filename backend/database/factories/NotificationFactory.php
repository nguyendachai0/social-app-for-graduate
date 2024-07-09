<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\ProfileUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public $referenceTypes = [
        'App\Models\Message',
        'App\Models\Share',
        'App\Models\FriendRequest',
        'App\Models\CommentLike',
        'App\Models\PostComment',
        'App\Models\PostLike',
        'App\Models\Conversation',
        'App\Models\UserPost',        
    ];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $referenceType = $this->faker->randomElement($this->referenceTypes);

        return [
            'profile_user_id' => ProfileUser::factory(),
            'type' => $this->faker->randomElement(['message', 'share', 'friend_request', 'comment_like', 'post_comment', 'post_like', 'conversation', 'user_post']),
            'reference_id' => $this->faker->randomDigitNotNull,
            'reference_type' => $referenceType,
            'status' => $this->faker->randomElement(['new', 'read']),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),  
        ];
    }
}
