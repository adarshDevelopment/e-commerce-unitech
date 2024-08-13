<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = ['name', 'street_address', 'city', 'country', 'about_us', 'email', 'phone','pan_no','logo','fav_icon',
        'facebook','twitter','youtube','instagram','google_map','status', 'created_by', 'updated_by'];


    function createdBy(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
