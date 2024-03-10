<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reseller;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reseller>
 */
class ResellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reseller::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'brand' => $this->faker->company,
            'address' => $this->faker->address,
            'logo_path' => $this->faker->imageUrl(),
            'link_social' => $this->faker->url,
            'is_active' => $this->faker->boolean,
        ];
    }
}
