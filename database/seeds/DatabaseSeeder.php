<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
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
    }
}
