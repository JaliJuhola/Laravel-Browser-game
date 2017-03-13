<?php
/**
 * Created by PhpStorm.
 * User: JJ
 * Date: 10.3.2017
 * Time: 5.44
 */

namespace App\Tribe;


use App\Troops\BasicTroop;
use Illuminate\Support\Facades\DB;

class BasicTribe extends Tribe
{
    public static $infantry = [];
    public static $cavalry = [];
    public static function init()
    {
          self::$infantry = [BasicTroop::class]; // maybe retrieved from database?
    }
}