<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GameworldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Europe/Helsinki');
        $gameWorldConfig = require "config/gameworldConfig.php";
        \App\Gameworld::start($gameWorldConfig);
        $users = $gameWorldConfig['initusers'];
        foreach ($users as $user) {
            $user['password'] = bcrypt($user['password']);
            $id = \Illuminate\Support\Facades\DB::table('users')->insertGetId(
                $user
            );
            \App\Player::saveToGameWorld($id, "BasicTribe");
        }
        $date = date('m/d/Y h:i:s a');
        \App\Announcement::insertGetId(['user_id' => 1, 'body' =>
            "Game has been started " . $date, 'heading' => "Automatic starting info",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
