<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';
    protected $fillable = ['name', 'route', 'status', 'created_by', 'updated_by'];


    function permissions(){
        return $this->hasMany(Permission::class);
    }

    function getPermission(){
        return $this->belongsTo(Permission::class, 'module_id','id');
    }


    function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }

}
