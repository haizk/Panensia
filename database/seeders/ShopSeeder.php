<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create(
            [
                'name' => 'RotiDoi',
                'desc' => 'Roti Bakar Asal Tuban',
                'logo_path' => null,
                'address' => 'Tuban Kulon RT 02',
                'link_ig' => null
            ],
            [
                'name' => 'Seblak Solo',
                'desc' => 'Seblak Asal Jebres',
                'logo_path' => null,
                'address' => 'Jl. Mojo No.69',
                'link_ig' => null
            ],
        );
    }
}
