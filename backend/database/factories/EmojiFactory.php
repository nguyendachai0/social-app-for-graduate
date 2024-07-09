<?php

namespace Database\Factories;

use App\Models\Emoji;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emoji>
 */
class EmojiFactory extends Factory
{
    protected $model = Emoji::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_emoji' => $this->faker->randomElement(['like', 'heart', 'care', 'laugh', 'amazing', 'sad', 'angry', 'sigma']),
        ];
    }
}
