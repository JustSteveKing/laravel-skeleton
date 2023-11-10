<?php

declare(strict_types=1);

namespace App\Models\Handlers;

use App\Models\User;

final class AddsAvatarFromEmail
{
    public function __construct(User $user)
    {
        $user->update([
            'avatar' => "https://unavatar.io/{$user->email}",
        ]);
    }
}
