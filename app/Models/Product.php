<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(subCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_img()
    {
       return $this->hasMany(ProductImage::class);
    }
}
