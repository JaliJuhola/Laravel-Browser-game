<?php
/**
 * Created by PhpStorm.
 * User: JJ
 * Date: 10.3.2017
 * Time: 5.44
 */

namespace App\Tribe;


use App\Troops\BasicTroop;
use App\Troops\SecondTroop;
use Illuminate\Support\Facades\DB;

class BasicTribe extends Tribe
{
    public static $infantry = [BasicTroop::class, SecondTroop::class];
    public static $cavalry = [];
    public static $tribeName = "BasicTribe";


}