<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;
    protected $table = 'user_comments';
    protected $fillable = ['name', 'product_id', 'customer_id', 'comment'];

    function customers(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
