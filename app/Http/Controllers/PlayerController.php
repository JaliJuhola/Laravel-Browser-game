<?php

namespace App\Http\Controllers;

use App\Army;
use App\City;
use App\Gameworld;
use App\Player;
use App\TroopUnit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       return view('submitPlayer');
    }
    public function save(Request $request)
    {
        Player::saveToGameWorld(Auth::user()->id, $request->tribe);
        return view('home', ['status' => 'You have verified you account!']);
    }
    public function playersIndex()
    {
        $users = User::join('players', 'players.user_id', 'users.id')
        ->select(['id' => 'users.id', 'tribe' => 'players.Tribe',
            'name' => 'users.name', 'created_at' => 'players.created_at'])
        ->get();
        return view('players', ['users' => $users]);
    }
    public static function deleteSafely($id)
    {
        self::delete($id);
    }
}
