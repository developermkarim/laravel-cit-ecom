<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['product_id','product_uri','product_name'];
    use HasFactory;


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*   */
}
