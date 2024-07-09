<?php

namespace Database\Factories;

use App\Models\Share;
use App\Models\ProfileUser;
use App\Models\UserPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShareFactory extends Factory
{
    protected $model = Share::class;

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
            'recaption' => $this->faker->sentence,
            'shared_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
