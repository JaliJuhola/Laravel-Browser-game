<?php

namespace App;

use App\Tribe\Tribe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Player extends Model
{
    protected $fillable = [
        'tribe', "acticeCity", 'user_id', 'created_at'
    ];
    protected $primaryKey = 'user_id';

    public function cities()
    {
        $this->hasMany('\\App\\City', 'user_id', 'user_id');
    }
    public static function saveToGameWorld($userId, $tribe)
    {
        $player = new Player;
        $player->tribe = $tribe;
        $player->user_id = $userId;
        $player->save();
        Gameworld::addCity(0, 0,['capital' => 1, 'player_id' => $userId], $tribe);
    }
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function cityCount()
    {
        return count($this->cities());
    }
    public static function getActiveCity()
    {
        $player = self::all()->where('user_id', Auth::user()->id)->first();
        if($player->activeCity === null) {
            $cap = City::getCapital();
            self::setActiveCity($cap->id);
        }
        return City::all()->where('player_id', $player->user_id)
            ->where('id', $player->activeCity)
            ->first();
    }
    public static function setActiveCity($activeCity)
    {
        self::where('user_id', "=", Auth::user()->id)
        ->update(['activeCity' => $activeCity]);
    }
}
