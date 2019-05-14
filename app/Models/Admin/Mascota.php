<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $table = 'Mascotas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'raza', 'edad', 'users_id'];
    
}
