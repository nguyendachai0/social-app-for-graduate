<?php

namespace Database\Seeders;
use App\Models\Emoji;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmojiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emoji::factory()->count(6)->create();   

    }
}
