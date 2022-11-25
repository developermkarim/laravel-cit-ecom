<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subsubcategories = ['HP',"ASUS","Dell","","Note Series",'Rede Mi','POCO','Ipad','Iphone Plus','Iphone Pro Max','Headphone','Suny LCD','Samsung TV','Canon Camera','Fujifilm Camera','Panasonic Camera']; 

        foreach ($subsubcategories as $key => $value) {
           $model = new SubSubCategory();
           $model->title =$value;
           $model->slug = str($value)->slug();
           $model->sub_category_id = SubCategory::inRandomOrder()->first()->id;
        //    $model->subSubCategory_image = fake()->image('',640, 480, null, true, null, true);
           $model->subSubCategory_image_uri = fake()->imageUrl(640, 480, null, true, null, true);
           $model->save();
        }
    }
}
