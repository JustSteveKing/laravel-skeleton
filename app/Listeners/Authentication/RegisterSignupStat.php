<?php

declare(strict_types=1);

namespace App\Listeners\Authentication;

use App\Stats\SignupStats;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

final class RegisterSignupStat implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(Registered $event): void
    {
        SignupStats::increase();
    }
}
