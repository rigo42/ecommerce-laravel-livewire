<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'detail' => $this->faker->sentence,
            'description' => $this->faker->text,
            'sku' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'quantity' => $this->faker->randomDigit,
            'price' => $this->faker->numberBetween($min = 100, $max = 1000),
            'featured' => $this->faker->numberBetween($min = 0, $max = 1),
            'stock' => true,
        ];
    }
}
