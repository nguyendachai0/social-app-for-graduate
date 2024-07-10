<?php

namespace Database\Seeders;
use App\Models\ProfileUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProfileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileUser::factory()->count(50)->create();
    }
}
