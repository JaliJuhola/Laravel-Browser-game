<?php

namespace App;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Queue\ShouldQueue;
class TroopUnit extends Model implements ShouldQueue
{

    protected $fillable = ['troopname', 'amount', 'army_id'];
    protected $table = "troopunits";

    public function army()
    {
        $this->belongsTo(Army::class);
    }
}
