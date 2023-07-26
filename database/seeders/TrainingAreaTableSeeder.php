<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('training_areas')->insert([
            'training_area' => '腕'
        ]);
        DB::table('training_areas')->insert([
            'training_area' => '腹筋'
        ]);
        DB::table('training_areas')->insert([
            'training_area' => '肩'
        ]);
        DB::table('training_areas')->insert([
            'training_area' => '歩く'
        ]);
        DB::table('training_areas')->insert([
            'training_area' => '走る'
        ]);
        DB::table('training_areas')->insert([
            'training_area' => 'バイク'
        ]);
    }
}
