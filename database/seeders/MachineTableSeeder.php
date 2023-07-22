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
        ]);
        DB::table('machines')->insert([
            'machine_name' => 'マシーン２',
        ]);
        DB::table('machines')->insert([
            'machine_name' => 'マシーン３',
        ]);
    }
}
