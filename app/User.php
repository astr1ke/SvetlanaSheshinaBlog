<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto', 'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles(){
        return $this->hasMany(article::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
