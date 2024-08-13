<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $fillable = ['category_id','name', 'status','slug', 'short_description', 'description', 'image', 'meta_keyword' ,'meta_description',
        'created_by', 'updated_by'];

    function getCategory(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    function products(){
        return $this->hasMany(Product::class);
    }
}
