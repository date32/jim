<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'test',
            'password' => Hash::make('1'),
            'weight' => 60,
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'password' => Hash::make('1'),
            'weight' => 50,
        ]);
        
    }
}
