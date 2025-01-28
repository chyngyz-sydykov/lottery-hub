<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property string|null $referred_by
 * @property float|null balance
 */
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasUuids, Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
    ];

    protected $guarded = [
        'balance',
        'referred_by',
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'groups_users', 'user_id', 'group_id')
            ->using(GroupUser::class)
            ->withPivot('joined_at')
            ->withTimestamps();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function setBalance(float $amount): void
    {
        $this->balance = $amount;
        $this->save();
    }

    public function setReferredBy(?string $referredBy): void
    {
        $this->referred_by = $referredBy;
        $this->save();
    }
}
