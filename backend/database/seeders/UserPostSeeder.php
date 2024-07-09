<?php

namespace Database\Seeders;
use App\Models\UserPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPost::factory()->count(50)->create();
    }
}
