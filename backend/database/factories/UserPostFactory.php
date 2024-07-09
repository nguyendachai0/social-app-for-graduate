<?php

namespace Database\Factories;

use App\Models\UserPost;
use App\Models\ProfileUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPostFactory extends Factory
{
    protected $model = UserPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_user_id' => ProfileUser::factory(),
            'caption' => $this->faker->sentence,
            'media_url' => $this->faker->imageUrl(),
            'shared_count' => $this->faker->numberBetween(0, 100),
        ];
    }
}
