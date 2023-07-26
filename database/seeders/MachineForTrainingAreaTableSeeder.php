<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineForTrainingAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('machine_for_training_areas')->insert([
            'machine_id' => '1',
            'training_area_id' => '1',
        ]);
        DB::table('machine_for_training_areas')->insert([
            'machine_id' => '2',
            'training_area_id' => '2',
        ]);
        DB::table('machine_for_training_areas')->insert([
            'machine_id' => '3',
            'training_area_id' => '3',
        ]);
        DB::table('machine_for_training_areas')->insert([
            'machine_id' => '4',
            'training_area_id' => '4',
        ]);
        DB::table('machine_for_training_areas')->insert([
            'machine_id' => '5',
            'training_area_id' => '5',
        ]);
        DB::table('machine_for_training_areas')->insert([
            'machine_id' => '6',
            'training_area_id' => '6',
        ]);
    }
}
