<?php

namespace Database\Factories;

use App\Models\FriendRequest;
use App\Models\ProfileUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class FriendRequestFactory extends Factory
{
    protected $model = FriendRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sender = ProfileUser::factory()->create();
        $receiver = ProfileUser::factory()->create();
        return [
            'sender_id' => $sender->id,
            'receiver_id' => function () use ($sender){
                do {
                    $receiver = ProfileUser::factory()->create(); 
                }while($sender->id === $receiver->id);
                return $receiver->id;
            },
            'status' => $this->faker->randomElement(['pending','rejected', 'accepted']),
            'sent_at' => now(),
            'responded_at' => null,
        ];
    }
}
