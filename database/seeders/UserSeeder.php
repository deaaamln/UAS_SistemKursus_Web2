<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        User::create([
            'name' => 'User 1',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Admin 1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

    }
}
