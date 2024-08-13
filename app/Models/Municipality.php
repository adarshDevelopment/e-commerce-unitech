<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $table = 'municipalities';
    protected $fillable = ['name', 'province_id', 'district_id', 'created_by', 'status', 'updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    function getProvince(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    function getDistrict(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
