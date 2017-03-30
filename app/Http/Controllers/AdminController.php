<?php

namespace App\Http\Controllers;

use App\Gameworld;
use App\Http\Middleware\AdminMiddleware;
use App\User;
use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;


class AdminController extends Controller
{

    public function index()
    {
        return view('admin/adminPlayers');
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
    public function deleteUser(Request $request)
    {
        $deleteId = $request->user_id;
       return User::safelyDelete($deleteId);

    }
    public function usersJson()
    {
        return User::getUserPlayerList();
    }
}