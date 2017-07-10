<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    //One to One relationship
    public function post() {

        return $this->hasOne('App\Post');
    }

    //One to Many relationship
    public function posts() {
        return $this->hasMany('App\Post');
    }

    // Many to Many
    public function roles() {
        
        return $this->belongsToMany('App\Role')->withPivot('created_at');

        // To customize table name and columns follow the format below
        //return $this->belongsToMany('App\Role', 'user-role', 'user_id', 'role_id');
        
    }

    public function photos() {
      return $this->morphMany('App\Photo', 'imageable');
    }
}
