<?php

namespace Database\Factories;
use App\Models\Conversation;
use App\Models\ProfileUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'conversation_id' => Conversation::factory(),
            'sender_id' => ProfileUser::factory(),
            'message_content'=>  $this->faker->sentence,
            'media_url' => $this->faker->imageUrl(),
            'read_at' => now()
        ];
    }
}
