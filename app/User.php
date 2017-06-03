<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'username', 'email', 'password', 'first_name', 'last_name', 'mobile', 'confirmation_token', 'is_enabled'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function annonces(){
        return $this->hasMany(Annonce::class);
    }

    public  function roles(){
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function hasRole($role){
        $role = $this->roles->where('name', $role)->first();
        if($role){
            return true;
        }
        return false;
    }

    public function isSuperAdmin(){
        return $this->hasRole('ROLE_SUPER_ADMIN');
    }
}
