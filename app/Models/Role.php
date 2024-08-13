<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['name', 'status', 'created_by', 'updated_by'];

    function permissions(){
        return $this->belongsToMany(Permission::class,'permission_roles');
    }

    function getPermission(){
        return $this->hasMany(Permission::class, 'module_id','id');
    }


    function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }
}
