<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vendor_id'=>Vendor::factory(),
            // 'vendor_id'=>10,
            'name'=> fake()->name(),
            'description'=> fake()->sentence(3),
            'price'=> fake()->randomFloat(2),
            'quantity'=> fake()->randomDigitNot(0),
            'uom'=> 'Mtr',
            'image'=> fake()->imageUrl(640, 480, 'transport'),
            'slug'=> fake()->slug(2),
            'featured'=>fake()->boolean(20)
        ];
    }
}
