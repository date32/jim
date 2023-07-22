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
            'time' => '10:25',
            'speed' => '6',
            'distance' => '2',
            'weight' => '5',
            'count' => '100',
        ]);
        DB::table('trainings')->insert([
            'user_id' => '2',
            'machine_id' => '2',
            'time' => '11:25',
            'speed' => '5',
            'distance' => '1',
            'weight' => '7',
            'count' => '60',
        ]);
        DB::table('trainings')->insert([
            'user_id' => '2',
            'machine_id' => '3',
            'time' => '12:00',
            'speed' => '10',
            'distance' => '3',
            'weight' => '5',
            'count' => '120',
        ]);
    }

}
