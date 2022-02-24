<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function post()
    {
        //One to one
        return $this->hasOne('App\Post', 'user_id');
    }

    public function posts()
    {
        //One to many
        return $this->hasMany('App\Post');
    }

    public function roles()
    {
        //Many to many

        //To customize tables and columns follow the format
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');

        return $this->belongsToMany('App\Role')->withPivot('created_at');
    }
    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
}
