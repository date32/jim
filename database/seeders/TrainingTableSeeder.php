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
        ]);
    }

}
