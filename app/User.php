<?php

namespace App;
use App\Rol;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function authorizeRoles($rols)
    {
        abort_unless($this->hasAnyRole($rols), 401);
        return true;
    }

    public function rols(){
        return $this->belongsToMany(Rol::class)->withTimestamps();
    }

    public function hasAnyRoles($rols){
        return null !== $this->rols()->whereIn('name', $rols)->first();
    }
    
    public function hasAnyRole($rol){
        return null !== $this->rols()->where('name', $rol)->first();
    }

}
