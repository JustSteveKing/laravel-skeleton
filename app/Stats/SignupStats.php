<?php

declare(strict_types=1);

namespace App\Stats;

use Spatie\Stats\BaseStats;

final class SignupStats extends BaseStats
{
    public function getName(): string
    {
        return 'signups';
    }
}
