<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['module_id', 'name', 'route', 'status', 'created_by', 'updated_by'];

    function createdBy(){
        return $this->belongsTo(User::class, 'created_by','id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by','id');
    }

    function getModuleID(){
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }


    //function to denote many to many relationship with permission_roles table
    function permissions(){
        return $this->belongsToMany(Role::class,'permission_roles');
    }
}
