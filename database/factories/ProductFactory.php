<?php

namespace Database\Factories;

use App\Models\Category;
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
        $randomCategory = Category::all()->random();

        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(200, 800),
            'description' => $this->faker->sentence,
            'image' => $this->faker->image('public/storage/products', 800, 800, 'cats', false),
            'category_id' => $randomCategory->id,
        ];
    }
}
