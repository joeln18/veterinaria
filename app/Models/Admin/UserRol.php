<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $table =  'users_rol';
    protected $primaryKey = 'id';
    protected $fillable = ['rol_id', 'users_id', 'estado'];
}
