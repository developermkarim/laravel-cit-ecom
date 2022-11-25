<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
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
            'sub_sub_category_id'=>SubSubCategory::inRandomOrder()->first()->id,
            'brand_id'=>Brand::inRandomOrder()->first()->id,
            'title'=> fake()->name(),
            'slug'=> str()->slug(fake()->name()),
            'price'=> fake()->numberBetween(5000,49000),
            'qty'=>fake()->numberBetween(4,20),
            'tags'=> 'new product,top product',
            'sizes'=> 'XXL,XL,L,M',
            'colors'=> 'Red,Green,Blue,Black',
            'status'=> true,
            'hot_deals'=>1,
            'featured'=>1,
            'special_deals'=>1,
            'special_offer'=>1,
            'vendor_id'=>1,
            'product_code'=> strtoupper(Str::Random(10)),
            'short_detail'=>fake()->sentence(),
            'long_detail'=>fake()->sentence(),
            'thumbnail_uri'=>fake()->imageUrl(640,480,null,true,null),
            // 'thumbnail_name'=>fake()->image(640,480,null,true,null),
           
            
        ];
    }
}
/* 
  $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('sub_sub_category_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('brand_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->integer('qty');
            $table->integer('discount_price')->nullable();
            $table->boolean('status')->default(true);
            $table->string('tags')->nullable();
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('product_code');
            $table->longText('short_detail')->nullable();
            $table->longText('long_detail')->nullable();
            $table->string('thumbnail_uri')->nullable();
            $table->string('thumbnail_name')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->string('video_uri')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();

*/
/* $table->integer('hot_deals')->nullable();
$table->integer('featured')->nullable();
$table->integer('special_offer')->nullable();
$table->integer('special_deals')->nullable(); */