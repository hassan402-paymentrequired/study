<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Room;
use App\Models\Topic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        Room::factory(10)->create();
        Message::factory(10)->create();
    }
}
