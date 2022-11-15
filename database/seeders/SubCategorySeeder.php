<?php

namespace Database\Seeders;

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
       $subcategory = ['HP',"ASUS","Xiomi",'Apple','Headphone','Suny LCD','Samsung TV','Canon Camera','Fujifilm Camera','Panasonic Camera'];
       foreach ($subcategory as $key => $value) {
        $subcate = new SubCategory();
        $subcate->category_id = 1;
        $subcate->title = $value;
        $subcate->slug = str($value)->slug();
        $subcate->save();
       }
    }
}
