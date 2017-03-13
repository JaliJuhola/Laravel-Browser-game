<?php
/**
 * Created by PhpStorm.
 * User: JJ
 * Date: 10.3.2017
 * Time: 16.57
 */

namespace App\Troops;



abstract class Infantry extends Troops
{
  public static function type()
  {
      return "I";
  }
}