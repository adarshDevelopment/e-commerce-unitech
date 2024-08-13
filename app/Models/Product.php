<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['title', 'slug','price','discount','quantity', 'featured_product', 'category_id', 'subcategory_id',
        'short_description','specification','description','meta_keyword',
        'meta_title','meta_description', 'status',
        'created_by', 'updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags');
    }

    public function comments(){
        return $this->hasMany(UserComment::class,'product_id','id');
    }



    public function specifications(){
        return $this->hasMany(ProductSpecification::class,'product_id','id');
    }

    //functions for show page

    public function getCategory(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function getSubcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id', 'id');
    }

    public function productAttributes(){
        return $this->hasMany(ProductAttribute::class);
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function productPrice(){
        return $this->hasMany(ProductPrice::class,'product_id','id');
    }



}
