<?php

namespace Database\Factories;


use App\Models\ProfileUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileUser>
 */
class ProfileUserFactory extends Factory
{   

    protected $model = ProfileUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'), // bcrypt for hashing password
            'date_of_birth' => $this->faker->date(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'sur_name' => $this->faker->lastName,
            'remember_token' => Str::random(10),
        ];
    }
}
