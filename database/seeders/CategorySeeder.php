<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /*
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Computers','Cell Phones','TV & Video','Camera & Photo','accessories'];
        foreach ($categories as $key => $value) {
            $category = new Category();
            $category->title = $value;
            $category->slug = str($value)->slug();
            $category->save();
        }
       
    }
}
