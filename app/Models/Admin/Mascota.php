<?php

namespace App\Models\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Mascota extends Model
{
    //
    protected $table = 'mascotas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'raza', 'edad', 'users_id'];
    
}
