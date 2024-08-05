<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use App\Models\SubscriberDetails;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        SubscriberDetails::factory(50)->create();
    }
}
