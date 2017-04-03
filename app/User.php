<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token', 'password'
    ];

    public static function safelyDelete($id)
    {
       Gameworld::clearUsersCities($id); // clears references to users cities from map
        // Here should be added more values to delete when deleting whole user
        self::destroy($id);
    }

    public function player()
    {
        return $this->hasOne('App\\Player');

    }

    public function cities()
    {
        return count($this->player()->cities());
    }

    public static function getUserPlayerList()
    {
        return DB::table('players')->select('Tribe', 'user_id', 'created_at')
            ->join('users', 'users.id', '=', 'players.user_id')
            ->select('Tribe','user_id', 'name', 'email', 'players.created_at')
            ->get();
    }
}
