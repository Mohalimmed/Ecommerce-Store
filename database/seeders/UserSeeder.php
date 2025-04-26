<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mohammed',
            'email' => 'm@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
        ]);

        DB::table('users')->insert([
            'name' => 'Ali',
            'email' => 'a@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '12345678900',
        ]);
    }
}
