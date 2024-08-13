<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'status','slug', 'rank', 'short_description', 'description', 'image', 'meta_keyword' ,'meta_title', 'meta_description',
        'status', 'created_by', 'updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    function subcategories(){
        return $this->hasMany(Subcategory::class,'category_id', 'id');
    }
    function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
