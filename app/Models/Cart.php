<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
 /*    protected $fillable = ['id','user_id',
    'product_id',
    'quantity']; */

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
