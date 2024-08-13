<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = ['name', 'province_id', 'created_by', 'status', 'updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    function getProvince(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
