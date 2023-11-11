<?php

declare(strict_types=1);

namespace App\Console;

use App\Console\Commands\Reports\Weekly\SignupStatsReport;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

final class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(SignupStatsReport::class)->weeklyOn(
            dayOfWeek: 'friday',
            time: '09:00',
        );
    }

    protected function commands(): void
    {
        $this->load(
            paths: __DIR__ . '/Commands',
        );
    }
}
