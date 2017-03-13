<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
   protected $table = 'armies';
   protected $fillable = ['troopname', 'amount'];

    public function city()
    {
        $this->belongsTo(City::class);
    }
}
