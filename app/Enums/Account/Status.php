<?php

declare(strict_types=1);

namespace App\Enums\Account;

enum Status: string
{
    case PENDING = 'pending';
    case VERIFIED = 'verified';
    case ARCHIVED = 'archived';
}
