<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsCategories;
use App\Models\NewsImages;
use App\Models\User;
use App\Models\Contact;
use App\Models\Reseller;
use App\Models\Product;

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
            // ShopSeeder::class,
            ContactSeeder::class,
            ResellerSeeder::class,
            ProductSeeder::class,
            UserSeeder::class
        ]);
    }
}
