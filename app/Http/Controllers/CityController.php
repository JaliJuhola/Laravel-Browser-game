<?php

namespace App\Http\Controllers;

use App\Army;
use App\City;
use App\Gameworld;
use App\Player;
use App\Tribe\BasicTribe;
use App\TroopQueue;
use App\TroopUnit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function cityJson(Request $request)
    {
        $city = Player::getActiveCity();
        if($city) {
            $user = $this->getCityViewItems($city, $request);
            return json_encode($user);
        }
        return ['taalla virhe'];
    }

    public function index($id = -1, Request $request)
    {
        if($id === -1)
        {
           return $this->undefinendCityId($request);
        }
        return $this->definedCityId($id, $request);
    }

    public function updateName(Request $request)
    {
        $id = $request->id;
        $name = $request->cityname;
        City::where('id', "=", $id)->update(['name' => $name]);
        return back();
    }
    private function getCityViewItems($city, Request $request)
    {
        $army = Army::all()->where('city_id', '=', $city->id)->first();
        $troopUnits = TroopUnit::all()->where('army_id', '=', $army->id);
        $square = Gameworld::all()->where('city_id', '=', $city->id)->first();
        $troopqueue = TroopQueue::all()->where('army_id', '=', $army->id);
        Player::setActiveCity($city->id);
        return ['troopqueue' => $troopqueue, 'city' => $city, 'square' => $square, 'army' => $army,
            'troopUnits' => $troopUnits];
    }
    private function definedCityId($id, Request $request)
    {
        $city = City::all()->where('id', "=", $id)->first();
        if($city === null)
        {
            return view('home', ['status' => 'City not found']);
        }
        if ($city->player_id === Auth::user()->id) { // if player owns city returns cityview whit troops etc
            return view('city', $this->getCityViewItems($city, $request));
        } else { // player doesnt own city returns foreign cityview
            return view('cityview', ['city' => $city]);
        }
    }
    private function undefinendCityId(Request $request)
    {
        $activeCity = Player::getActiveCity();
        if($activeCity)
        {
            $city = City::all()->where('player_id', '=', Auth::user()->id)
                    ->where('id', '=', $activeCity->id)->first();
            if($city !== null) {
                return view('city', $this->getCityViewItems($city, $request));
            }
        }
        $cities = City::all()->where('player_id', '=', Auth::user()->id);
        foreach ($cities as $c) {
            if ($c->capital === 1) {
                return view('city', $this->getCityViewItems($c, $request));
            }
        }
    }

}
