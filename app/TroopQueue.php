<?php

namespace App;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Queue\ShouldQueue;

class TroopQueue extends Model implements ShouldQueue
{

    protected $table = "troopqueue";
}
