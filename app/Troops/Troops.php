<?php
/**
 * Created by PhpStorm.
 * User: JJ
 * Date: 10.3.2017
 * Time: 16.55
 */

namespace App\Troops;


abstract class Troops
{
    public static $attackPower;
    public static $speed;
    public static $defensePower;
    public static abstract function type();

}