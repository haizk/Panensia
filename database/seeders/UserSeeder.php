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
            'name'      => 'Admin Panensia',
            'email'     => 'admin@panensia.id',
            'password'  => bcrypt('password'),
            'is_superAdmin' => 1,
        ]);
    }
}
