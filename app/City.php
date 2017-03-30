<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Army;

class City extends Model
{
    protected $table = 'citys';
    protected $fillable = ['capital', 'name', 'player_id', 'created_at'];

    public function player()
    {
        $this->belongsTo(Player::class);
    }

    public function armies()
    {
        $this->hasMany(Army::class);
    }

    public static function createCity($parameters = [], $tribe)
    {
        $id = DB::table('citys')->insertGetId($parameters);
        Army::createArmy(['city_id' => $id], $tribe);
        return $id;
    }

    public static function getCapital()
    {
        $capital = City::all()->where('player_id', Auth::user()->id)
            ->where('capital', '=', true)
            ->first();
        return $capital;
    }

    public static function getPlayersCities($id)
    {
        $cities = self::where('player_id', '=', $id)
            ->leftJoin('players', 'citys.id', '=', 'players.activeCity')
            ->get();
        return $cities;
    }
}
