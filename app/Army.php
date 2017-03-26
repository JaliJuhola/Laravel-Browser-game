<?php

namespace App;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Troops\BasicTroop;
use App\Troops\SecondTroop;
use App\Tribe\BasicTribe;

class Army extends Model
{
   protected $table = 'armies';
   protected $fillable = ['troopname', 'amount'];

    public function city()
    {
        $this->belongsTo(City::class);
    }
    public static function createArmy($parameters, $tribe)
    {

        $id = DB::table('armies')->insertGetId($parameters);
        foreach (BasicTribe::$infantry as $inf) { // now only one tribe so foreaching like this
            DB::table('troopunits')->insert(
                [
                    'army_id' => $id,
                    'troopname' => $inf::$troopName,
                    'amount' => '1'
                ]
            );
        }
    }
}
