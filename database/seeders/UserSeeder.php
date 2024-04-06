<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'Super Admin 2',
            'email'     => 'superadminn@example.com',
            'password'  => bcrypt('password'),
            'phone' => '08123456789',
            'is_superAdmin' => 1,
        ]);

        User::create([
            'name'      => 'Admin 2',
            'email'     => 'adminn@example.com',
            'password'  => bcrypt('password'),
            'phone' => '08123456789',
            'is_superAdmin' => 1,
        ]);
    }
}
