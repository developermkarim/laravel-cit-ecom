<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

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
    // category_id	sub_category_id	brand_id	title	slug	price	discount_price	status	start_date	end_date	product_code	short_detail	long_detail	thumbnail_uri	thumbnail_name	video_uri
    public function definition()
    {
        return [
            'category_id'=>Category::inRandomOrder()->first()->id,
            'sub_category_id'=>SubCategory::inRandomOrder()->first()->id,
            'title'=> fake()->name(),
            'slug'=> str()->slug(fake()->name()),
            'price'=> fake()->numberBetween(5000,49000),
            'status'=> true,
            'product_code'=>fake()->randomAscii(),
            'short_detail'=>fake()->sentence(),
            'long_detail'=>fake()->sentence(),
            'thumbnail_uri'=>fake()->imageUrl(640,480,null,true,null) ,
           
            
        ];
    }
}
