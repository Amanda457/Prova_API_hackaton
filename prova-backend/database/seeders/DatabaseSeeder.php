<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Activity;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        User::factory()->count(10)->create();
        Activity::factory()->count(10)->create();
        $this->call(ActivityUserSeeder::class);
    }
}
