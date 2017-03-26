<?php

namespace App\Http\Controllers;

use App\City;
use App\Gameworld;


class GameworldController extends Controller
{
    public function index()
    {
        $gameWorld = Gameworld::all();
        $cities = City::all();
        return view('map', ['gameworld' => $gameWorld, 'cities' => $cities]);
    }
}
