<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index($id = -1)
    {
        $city = null;
        $cities = City::all()->where('player_id','=', Auth::user()->id);
        if($id = -1)
        {
            foreach($cities as $c)
            {
                if($c->capital === 1)
                {
                    $city = $c;
                }
            }
        } else {
            foreach($cities as $c)
            {
                if($c->player_id === $id)
                {
                    $city = $c;
                }
            }
        }
        if(!isset($city))
        {
            return view('home', ['error' => 'Something went wrong try again']);
        }
        return view('city', ['city' => $city ]);
    }
}
