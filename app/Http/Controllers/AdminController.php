<?php

namespace App\Http\Controllers;

use App\Gameworld;
use App\Http\Middleware\AdminMiddleware;
use App\User;
use Illuminate\Http\Request;
use App\Player;
use League\Flysystem\Exception;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $players = Player::all();
        return view('admin', compact('players'));
    }
    public function map()
    {
        $gameworld = Gameworld::all();
        $players = Player::all();
        return view('map', compact($players, $gameworld));
    }
    public function log()
    {
        throw new Exception("Nothing here atm xD");
        return view('log');

    }
    public function deleteUser()
    {

        return back();
    }
}
