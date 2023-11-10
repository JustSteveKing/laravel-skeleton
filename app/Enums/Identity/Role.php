<?php

declare(strict_types=1);

namespace App\Enums\Identity;

enum Role: string
{
    case USER = 'user';
    case ADMIN = 'admin';
}
