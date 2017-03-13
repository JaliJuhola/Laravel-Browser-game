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
    public static function safelyDelete($id)
    {
        User::where('id', $id)->delete();
        Player::where('user_id', $id)->delete();
    }
    public function player()
    {
        return $this->hasOne('App\\Player');

    }
    public function cities()
    {
        return count($this->player()->cities());
    }
}
