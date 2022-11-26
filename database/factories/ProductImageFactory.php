<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id'=> Product::inRandomOrder()->first()->id, 
            'product_name'=> fake()->image('public/storage/product',640,480,null,false,true),
            'product_uri'=> fake()->imageUrl(640,480,null,true,null,false),
        ];
    }
}
