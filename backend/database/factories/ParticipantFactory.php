<?php

namespace Database\Factories;

use App\Models\Participant;
use App\Models\Conversation;
use App\Models\ProfileUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    protected $model = Participant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'conversation_id' => Conversation::factory(),
            'profile_user_id' => ProfileUser::factory(),
            'joined_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
