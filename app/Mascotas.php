<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $table = 'mascotas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'raza', 'edad', 'users_id'];

    public function users(){
        return $this->belongsTo('App\User');
    }
    
}
