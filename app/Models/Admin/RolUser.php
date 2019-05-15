<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $table =  'rol_user';
    protected $primaryKey = 'id';
    protected $fillable = ['rol_id', 'user_id'];
}
