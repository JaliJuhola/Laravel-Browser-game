<?php
/**
 * Created by PhpStorm.
 * User: JJ
 * Date: 10.3.2017
 * Time: 16.59
 */

namespace App\Troops;


class BasicTroop
{
    public static $attackPower = 20;
    public static $speed = 10;
    public static $defencePower = 5;
    public static $troopName = "BasicTroop";
    public static $trainingSpeed = 5;
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