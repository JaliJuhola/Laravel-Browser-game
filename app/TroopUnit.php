<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TroopUnit extends Model
{
    protected $fillable = ['troopname', 'amount'];

    public function army()
    {
        $this->belongsTo(Army::class);
    }
}
