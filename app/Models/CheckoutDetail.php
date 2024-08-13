<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    use HasFactory;
    protected $table = 'checkout_details';
    protected $fillable = ['checkout_id', 'product_id', 'price', 'quantity', 'discount','discounted_price', 'tax', 'subtotal', 'total'];

    protected function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
