<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsCategories;
use App\Models\NewsImages;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // NewsCategoriesSeeder::class,
            // NewsImagesSeeder::class,
            // NewsSeeder::class,
            ShopSeeder::class,
            ProductSeeder::class
        ]);
    }
}
