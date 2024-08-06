<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'fadd',
                'nama' => 'Fadhilah Ruhiyah',
                'password' => Hash::make('Fadill54'),
            ],
            [
                'username' => 'agust',
                'nama' => 'Agust Isa Martinus',
                'password' => Hash::make('Agustisa54'),
            ],
        ]);
    }
}
