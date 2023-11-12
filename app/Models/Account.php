<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Account\Status;
use App\Models\Handlers\AddsSlugFromName;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string $email
 * @property Status $status
 * @property null|string $logo
 * @property string $user_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property User $user
 * @property Collection<AccountInvite> $invites
 */
final class Account extends Model
{
    use HasFactory;
    use HasUlids;
    use Notifiable;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'status',
        'logo',
        'user_id',
    ];

    /**
     * @var array<string,string|class-string>
     */
    protected $casts = [
        'status' => Status::class,
    ];

    /**
     * @var array<string,class-string>
     */
    protected $dispatchesEvents = [
        'created' => AddsSlugFromName::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function invites(): HasMany
    {
        return $this->hasMany(
            related: AccountInvite::class,
            foreignKey: 'account_id',
        );
    }
}
