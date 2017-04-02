<?php

namespace App\Http\Controllers;

use App\Army;
use App\BattleSimulation;
use App\Player;
use App\Tribe\BasicTribe;
use App\TroopQueue;
use App\TroopUnit;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ArmyController extends Controller implements ShouldQueue
{
    use Queueable;

    function attackToCity($id, Request $request)
    {
        $attackerCityId = Player::getActiveCity()->id;
        $defenderCityId = $id;
        $attackerA = Army::all()->where('city_id', '=', $attackerCityId)->first();
        $defenderA = Army::all()->where('city_id', '=', $defenderCityId)->first();
        $attackerBeforeBattle = TroopUnit::all()->where('army_id', '=', $attackerA->id);
        $defenderBeforeBattle = TroopUnit::all()->where('army_id', '=', $defenderA->id);
        $attackerBefore= TroopUnit::all()->where('army_id', '=', $attackerA->id);
        $defenderBefore = TroopUnit::all()->where('army_id', '=', $defenderA->id);
        $result = BattleSimulation::simulate($attackerBeforeBattle, $defenderBeforeBattle);
        $attackerAfterBattle = $result['attacker'];
        $defenderAfterBattle = $result['defender'];
          foreach ($attackerAfterBattle as $aab)
          {
              $item = TroopUnit::where('army_id', $aab->army_id)
                  ->where('troopname', $aab->troopname)
                  ->update(['amount' => $aab->amount]);
          }
        foreach ($defenderAfterBattle as $dab)
        {
            $item = TroopUnit::where('army_id', $dab->army_id)
                ->where('troopname', $dab->troopname)
                ->update(['amount' => $dab->amount]);
        }
        return view('battleresult', ['attackerAfter' => $attackerAfterBattle, 'attackerBefore' => $attackerBefore,
            'defenderBefore' => $defenderBefore, 'defenderAfter' => $defenderAfterBattle]);
    }

    function addTroops($id, Request $request)
    {
        $infantry = BasicTribe::$infantry;
        foreach ($infantry as $item) {
            $value = $item::$troopName . "Amount";
            $amount = $request->$value;
            if ($amount > 0) {
                $ready = Carbon::now()->addSecond($item::$trainingSpeed * $amount)->timestamp;
                $troopque = new TroopQueue();
                $troopque->troopsready = $ready;
                $troopque->amount = $amount;
                $troopque->troopname = $item::$troopName;
                $troopque->army_id = $id;
                $troopque->save();
                $troopUnit = TroopUnit::where('army_id', '=', $troopque->army_id)
                    ->where('troopname', '=', $troopque->troopname)->first();
                $army = Army::where('id', '=', $troopque->army_id)->first();
            //    $job = (new Troopsready($troopUnit, $troopque))
             //       ->delay(Carbon::now()->addSecond($item::$trainingSpeed * $amount));
              //  dispatch($job);
            }
            Session::flash('message', "Troops succesfully added to queue");
            return back();

        }
        self::troopsReady();
        return back();
    }

    static function troopsReady()
    {
        $timestamp = Carbon::now()->timestamp;
        $troopsReady = TroopQueue::where("troopsready", '<', $timestamp)->get();
        foreach ($troopsReady as $item) {
            $addedtime = TroopUnit::where('army_id', '=', $item->army_id)
                ->where('troopname', '=', $item->troopname)->first();
            $joku = $item->amount + $addedtime->amount;
            TroopUnit::where('army_id', '=', $item->army_id)
                ->where('troopname', '=', $item->troopname)
                ->update(['amount' => $joku]);
            TroopQueue::where('army_id', '=', $item->army_id)
                ->where('troopname', '=', $item->troopname)->delete();
        }
    }
}
