<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('machines')->insert([
            'machine_name' => 'マシーン１',
            'type' => '筋力',
        ]);
        DB::table('machines')->insert([
            'machine_name' => 'マシーン２',
            'type' => '筋力',
        ]);
        DB::table('machines')->insert([
            'machine_name' => 'マシーン３',
            'type' => '筋力',
        ]);
        DB::table('machines')->insert([
            'machine_name' => 'ランニング（歩）',
            'type' => '持久力',
        ]);
        DB::table('machines')->insert([
            'machine_name' => 'ランニング（走）',
            'type' => '持久力',
        ]);
        DB::table('machines')->insert([
            'machine_name' => 'バイク',
            'type' => '持久力',
        ]);
    }
}
