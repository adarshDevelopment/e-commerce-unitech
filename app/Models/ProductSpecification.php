<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $table = 'product_specification';
    protected $fillable = ['product_id', 'attribute_id', 'specification_value'];

    public function attributes(){
        return $this->belongsTo(Attribute::class,'attribute_id','id');
    }


}
