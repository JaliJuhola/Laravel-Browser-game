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
        $users = User::all();
        return view('players', ['users' => $users]);
    }
    public static function deleteSafely($id)
    {
        self::delete($id);
    }
}
