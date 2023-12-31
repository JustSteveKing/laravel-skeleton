<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\Accounts\InviteCreated;
use App\Listeners\Accounts\SendAccountInvite;
use App\Listeners\Authentication\RegisterSignupStat;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

final class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            RegisterSignupStat::class,
        ],
        InviteCreated::class => [
            SendAccountInvite::class
        ]
    ];
}
