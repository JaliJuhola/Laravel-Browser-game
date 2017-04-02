<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       $gameWorldSeeder = new GameworldSeeder();
       $gameWorldSeeder->run();
    }
}
