<?php
/**
 * Created by PhpStorm.
 * User: JJ
 * Date: 24.3.2017
 * Time: 19.37
 */

namespace App\Troops;


class SecondTroop
{
    public static $attackPower = 50;
    public static $speed = 20;
    public static $defencePower = 500;
    public static $troopName = "SecondTroop";
    public static $trainingSpeed = 10;

    public static function attackpower()
    {
        return self::$attackPower;
    }

    public static function defencePower()
    {
        return self::$defencePower;
    }

    public static function troopname()
    {
        return self::$troopName;
    }
}