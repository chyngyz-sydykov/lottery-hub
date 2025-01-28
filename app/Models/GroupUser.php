<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $table = 'groups_users';

    protected $fillable = [
        'group_id',
        'user_id',
        'joined_at',
    ];

    public $timestamps = false; // Use `joined_at` as the timestamp
}
