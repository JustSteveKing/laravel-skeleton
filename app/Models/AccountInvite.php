<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Handlers\Accounts\TriggerEvents;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $id
 * @property string $email
 * @property string $token
 * @property string $account_id
 * @property string $user_id
 * @property null|CarbonInterface $expires_at
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Account $account
 * @property User $user
 */
final class AccountInvite extends Model
{
    use HasFactory;
    use HasUlids;
    use Notifiable;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'email',
        'token',
        'account_id',
        'user_id',
        'expires_at',
    ];

    /**
     * @var array<string,string|class-string>
     */
    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * @var array<string,string|class-string>
     */
    protected $dispatchesEvents = [
        'created' => TriggerEvents::class,
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(
            related: Account::class,
            foreignKey: 'account_id',
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }
}
