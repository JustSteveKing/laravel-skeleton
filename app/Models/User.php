<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Identity\Role;
use App\Models\Handlers\AddsAvatarFromEmail;
use Carbon\CarbonInterface;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Pennant\Concerns\HasFeatures;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property Role $role
 * @property string $password
 * @property null|string $remember_token
 * @property null|string $avatar
 * @property null|CarbonInterface $email_verified_at
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property null|CarbonInterface $deleted_at
 * @property Collection<PersonalAccessToken> $tokens
 */
final class User extends Authenticatable implements MustVerifyEmail, FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasFeatures;
    use HasUlids;
    use Notifiable;
    use SoftDeletes;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'remember_token',
        'avatar',
        'email_verified_at',
    ];

    /**
     * @var array<int,string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string,class-string>
     */
    protected $dispatchesEvents = [
        'created' => AddsAvatarFromEmail::class,
    ];

    /**
     * @var array<string,string|class-string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => Role::class,
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->email === 'juststevemcd@gmail.com';
    }
}
