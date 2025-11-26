<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@jagasiber.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Company User',
            'username' => 'company',
            'email' => 'company@jagasiber.com',
            'password' => Hash::make('password'),
            'role' => 'company',
        ]);

        User::create([
            'name' => 'Hunter User',
            'username' => 'hunter',
            'email' => 'hunter@jagasiber.com',
            'password' => Hash::make('password'),
            'role' => 'hunter',
        ]);
    }
}