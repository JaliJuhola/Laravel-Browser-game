<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $city = City::all()->where('player_id', '=', Auth::user()->id)->first();
        $request->session()->put('activeCity', $city->id);
        return view('home', ['city' => $city]);
    }
    public function announcementsJson()
    {
        $isAdmin = Auth::user()->isAdmin;
        $announcements =  Announcement::getAll();
        return ["announcements" => $announcements, "isAdmin" => $isAdmin];
    }
}
