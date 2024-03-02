<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shop;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'desc' => $this->faker->paragraph,
            'logo_path' => $this->faker->imageUrl,
            'address' => $this->faker->address,
            'link_ig' => $this->faker->url,
        ];
    }
}
