<?php
/**
 * Created by PhpStorm.
 * User: JJ
 * Date: 24.3.2017
 * Time: 22.39
 */

namespace App;

use App\Troops\BasicTroop;
use App\Troops\SecondTroop;

class BattleSimulation
{
    // only working infantry vs infantry
    public static function simulate($attacker, $defender)
    {
        $attackPower = 0;
        $defensePower = 0;
        foreach ($attacker as $attackerUnit) {
            $className = call_user_func(array('App\\Troops\\'.$attackerUnit->troopname, 'attackPower'));
            $attackPower = $className + $attackPower;
        }
        foreach ($defender as $defenderUnit) {
            $className = call_user_func(array('App\\Troops\\'. $defenderUnit->troopname, 'defencePower'));
            $defensePower = $className + $defensePower;
        }
        $attackPower = $attackPower - $defensePower;
        $defensePower = $defensePower - $attackPower;
        if ($attackPower >= $defensePower) {
            foreach ($attacker as $atUnit) {
                $power = call_user_func(array('App\\Troops\\'. $atUnit->troopname, 'attackPower'));
                if ($defensePower >= $atUnit->amount * $power) {
                    $defensePower = $defensePower - ($atUnit->amount * ($atUnit->troopname)::attackPower);
                    $atUnit->amount = 0;
                } else {
                    $power = call_user_func(array('App\\Troops\\'. $atUnit->troopname, 'attackPower'));
                    $removed = 0;
                    if($defensePower >= $power) {
                        $removed = $defensePower / $power;
                    }
                    $atUnit->amount = $atUnit->amount - $removed;
                    $defensePower = 0;
                }
            }
            foreach ($defender as $defUnit) {
                $defUnit->amount = 0;
            }
        } else {
            foreach ($defender as $defUnit) {
                $defTroopPower = call_user_func(array('App\\Troops\\'. $defUnit->troopname, 'defencePower'));
                if ($attackPower >= $defUnit->amount * $defTroopPower) {
                    $attackPower = $attackPower - ($defUnit->amount * $defTroopPower);
                    $defUnit->amount = 0;
                } else {
                    $removed = $attackPower / $defTroopPower;
                    $defUnit->amount = $defUnit->amount - $removed;
                    $attackPower = 0;
                }
            }
            foreach ($attacker as $atUnit) {
                $atUnit->amount = 0;
            }
        }
        return ['attacker' => $attacker, 'defender' => $defender];
    }
}