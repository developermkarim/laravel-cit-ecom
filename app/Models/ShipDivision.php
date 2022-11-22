<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;

class ShipDivision extends Model
{
    use HasFactory;
    protected $fillable =['division_name'];
    protected $table = 'ship_divisions';

    public function district()
    {
       return $this->hasMany(district::class,'division_id');
    }

}
