<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\User;

class Announcement extends Model
{
    public static function getAll()
    {
       return self::join('users', 'announcements.user_id', 'users.id')
            ->orderBy('announcements.created_at', 'asc')
            ->select(['name' => 'users.name', 'id' => 'announcements.id',
                'created_at' => 'announcements.created_at', 'body' => 'announcements.body',
                'heading' => 'announcements.heading'])->get();
    }
}
