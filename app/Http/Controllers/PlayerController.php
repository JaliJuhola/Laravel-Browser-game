<?php

namespace App\Http\Controllers;

use App\Army;
use App\City;
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
        $player = new Player;
        $player->tribe = $request->tribe;
        $player->user_id = Auth::user()->id;
        $player->save();
        $city = City::create((['capital' => 1, 'player_id' => Auth::user()->id]));
        $army = Army::create(['city_id' => $city->id]);
        TroopUnit::create(['army_id' => $army->id, 'troopname' => 'BasicTroop', 'amount' => '419' /* Reference xD*/]);   // Hardcoded change bls
        return view('home', ['status' => 'You have verified you account!']);
    }
    public function playersIndex()
    {
        $users = User::all();
        return view('players', ['users' => $users]);
    }
}
