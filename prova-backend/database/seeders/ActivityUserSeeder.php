<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Activity;

class ActivityUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $activities = Activity::all();

        foreach ($users as $user) {
            $randomActivities = $activities->random(rand(1, 9))->pluck('id');
            $user->activities()->attach($randomActivities);
        }
    }
}
