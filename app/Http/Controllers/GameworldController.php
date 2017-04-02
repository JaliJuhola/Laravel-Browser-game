<?php

namespace App\Http\Controllers;

use App\City;
use App\Gameworld;
use Illuminate\Support\Facades\Auth;


class GameworldController extends Controller
{
    public function index()
    {
        $gameWorld = Gameworld::all();
        $cities = City::all();
        return view('map', ['gameworld' => $gameWorld, 'cities' => $cities]);
    }
    public function mapJson()
    {
        $userId = Auth::user()->id;
        $gameworld = Gameworld::all();
        return ['user_id' => $userId, 'squares' => $gameworld];
    }
}

