<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\HorizonApplicationServiceProvider;

final class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    protected function gate(): void
    {
        Gate::define(
            ability: 'viewHorizon',
            callback: static fn(User $user): bool =>
                'juststevemcd@gmail.com' === $user->email,
        );
    }
}
