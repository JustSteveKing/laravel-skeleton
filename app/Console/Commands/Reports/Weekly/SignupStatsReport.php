<?php

declare(strict_types=1);

namespace App\Console\Commands\Reports\Weekly;

use App\Stats\SignupStats;
use Illuminate\Console\Command;
use Spatie\SlackAlerts\Facades\SlackAlert;

final class SignupStatsReport extends Command
{
    protected $signature = 'reports:signups';

    protected $description = 'Check the statistics for the last weeks signups';

    public function handle(): void
    {
        $stats = SignupStats::query()
            ->start(now()->subWeek())
            ->end(now())
            ->get();

        SlackAlert::blocks([
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => 'You had ' , $stats->count() . " new signups this week :tada:",
                ]
            ]
        ]);
    }
}
