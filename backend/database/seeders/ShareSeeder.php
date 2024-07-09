<?php

namespace Database\Seeders;

use App\Models\Share;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Share::factory()->count(150)->create();
    }
}
