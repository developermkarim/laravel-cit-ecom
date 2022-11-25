<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $subcategory = ['All Laptops',"Gaming Laptop",'desktops','Iphone','One-Plus','Realme','Vivo',"Action Camera",'Camera Lense','Digital Camera','DSLR','keyboard','Mouse','Headphone','All TV','LED TV','Smart TV'];
       foreach ($subcategory as $key => $value) {
        $subcate = new SubCategory();
        $subcate->category_id = Category::inRandomOrder()->first()->id;
        $subcate->title = $value;
        // $subcate->image = fake()->image(640, 480, null, true, null, true);
        $subcate->image_uri= fake()->imageUrl(640, 480, null, true, null, true);
        $subcate->slug = str($value)->slug();

        $subcate->save();
       }


    }
}

