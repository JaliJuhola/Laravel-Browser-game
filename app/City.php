<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'citys';
    protected $fillable = ['capital','name', 'player_id', 'created_at'];

   public function player()
   {
       $this->belongsTo(Player::class);
   }
   public function armies()
   {
       $this->hasMany(Army::class);
   }
}
