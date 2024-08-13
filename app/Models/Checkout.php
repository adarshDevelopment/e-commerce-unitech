<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = ['customer_id', 'address', 'subtotal', 'discount', 'tax',
        'total','payment_type', 'payment_code', 'status'];


    protected function customers(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    function subcategories(){
        return $this->hasMany(Subcategory::class,'category_id', 'id');
    }

    protected function orderDetails(){
        return $this->hasMany(CheckoutDetail::class,'checkout_id','id');
    }



}
