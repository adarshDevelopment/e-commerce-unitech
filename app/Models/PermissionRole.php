<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;
    protected $table = 'permission_roles';
    protected $fillable = ['role_id', 'permission_id'];

    function moduleID(){
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    function roleId(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    function permissionID(){
        return $this->belongsTo(Permission::class,'permission_id','id');
    }
}
