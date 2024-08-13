<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $table = 'product_price';
    protected $fillable = ['product_id','attribute_id', 'attribute_name', 'price'];


    function products(){
        return $this->hasMany(Product::class);
    }


}
