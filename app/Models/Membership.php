<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Identity\Role;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property Role $role
 * @property string $account_id
 * @property string $user_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Account $account
 * @property User $user
 */
final class Membership extends Model
{
    use HasFactory;
    use HasUlids;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'role',
        'account_id',
        'user_id',
    ];

    /**
     * @var array<string,string|class-string>
     */
    protected $casts = [
        'role' => Role::class,
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
