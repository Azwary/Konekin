<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'KONEKIN',
            'email' => 'konekin@gmail.com',
            'birthdate' => Carbon::create('2001', '01', '01'),
            'KEY'=>'SUPER',
            'password' => Hash::make('admin123'),
            'role' => 'superuser',
        ]);
    }
}
