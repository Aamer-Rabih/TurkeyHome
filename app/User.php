<?php

namespace App;

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
        'tc','full_name','username','phone','active','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //Roles Belonging to This User 
    public function roles(){

        return $this->belongsToMany('App\Role','role_user')
            ->withTimestamps();
    }

    //any role check for the user
    public function hasAnyRole($roles)
    {
        if (is_array($roles))
         foreach($roles as $role )
         {
             if ($this->hasRole($roles)){
                 return true;
             }
         }else{
             if ($this->hasRole($roles))
             {
                 return true;
             }
             else return false;
         }
    }
    //check if the user has a specific role
    public function hasRole($role)
    {
        if($this->roles()->where('role',$role)->first()){
        return true;
        }
        
        return false;
    }
}
