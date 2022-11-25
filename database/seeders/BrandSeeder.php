<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Sony','Panasonic','Samsung','Apple','Fujitsu','Xiomi','HP','Lenovo','Toshiba','Transcend'];

        foreach ($brands as $key => $value) {
            $Brand = new Brand();
            $Brand->title = $value;
            $Brand->slug = str($value)->slug();
            $Brand->brand_img = fake()->imageUrl(640, 480, null, true, null, true);
            $Brand->image_uri = fake()->imageUrl(640, 480, null, true, null, true);
            $Brand->save();
        }
    }
}
