<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(
            [
                'shop_id' => 1,
                'name' => 'Roti Kacang Keju',
                'desc' => 'Roti Bakar Rasa Kacang Keju',
                'link_tokped' => null,
                'link_shopee' => null
            ],
        );
    }
}
