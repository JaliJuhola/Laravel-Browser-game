<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Player extends Model
{
    protected $fillable = [
        'tribe',
    ];
    protected $primaryKey = 'user_id';

    public function cities()
    {
        $this->hasMany('\\App\\City', 'user_id', 'user_id');
    }
    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function cityCount()
    {
        return count($this->cities());
    }
}
