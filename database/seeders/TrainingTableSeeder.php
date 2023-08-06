<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trainings')->insert([
            'user_id' => '1',
            'machine_id' => '1',
            'minutes' => null,
            'seconds' => null,
            'speed' => null,
            'distance' => null,
            'weight' => '5',
            'count' => '100',
            'strength' => '100',
            'calorie' => '200',
            'created_at' => now(),
        ]);
        DB::table('trainings')->insert([
            'user_id' => '2',
            'machine_id' => '2',
            'minutes' => null,
            'seconds' => null,
            'speed' => null,
            'distance' => null,
            'weight' => '7',
            'count' => '60',
            'strength' => '80',
            'calorie' => '150',
            'created_at' => now(),
        ]);
        DB::table('trainings')->insert([
            'user_id' => '2',
            'machine_id' => '3',
            'minutes' => null,
            'seconds' => null,
            'speed' => null,
            'distance' => null,
            'weight' => '5',
            'count' => '120',
            'strength' => '50',
            'calorie' => '100',
            'created_at' => now(),
        ]);
        DB::table('trainings')->insert([
            'user_id' => '1',
            'machine_id' => '4',
            'minutes' => '8',
            'seconds' => '30',
            'speed' => '5',
            'distance' => '1',
            'weight' => null,
            'count' => null,
            'strength' => null,
            'calorie' => '200',
            'created_at' => now(),
        ]);
        DB::table('trainings')->insert([
            'user_id' => '2',
            'machine_id' => '5',
            'minutes' => '8',
            'seconds' => '30',
            'speed' => '5',
            'distance' => '1',
            'weight' => null,
            'count' => null,
            'strength' => null,
            'calorie' => '300',
            'created_at' => now(),
        ]);
        DB::table('trainings')->insert([
            'user_id' => '2',
            'machine_id' => '6',
            'minutes' => '8',
            'seconds' => '30',
            'speed' => '5',
            'distance' => '1',
            'weight' => null,
            'count' => null,
            'strength' => null,
            'calorie' => '120',
            'created_at' => now(),
        ]);
    }

}
