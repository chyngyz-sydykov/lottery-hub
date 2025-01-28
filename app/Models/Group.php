<?php

namespace App\Models;

use Database\Factories\GroupFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    /** @use HasFactory<GroupFactory> */
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'description',
        'participant_limit',
        'finishing_date',
        'is_archived',
        'price',
        'prize_pool',
        'status',
    ];

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'groups_users', 'group_id', 'user_id')
            ->using(GroupUser::class)
            ->withPivot('joined_at')
            ->withTimestamps();
    }
}
