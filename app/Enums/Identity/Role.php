<?php

declare(strict_types=1);

namespace App\Enums\Identity;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Role: string implements HasLabel, HasColor
{
    case USER = 'user';
    case ADMIN = 'admin';

    public function getLabel(): ?string
    {
        return match ($this->value) {
            'user' => 'User',
            'admin' => 'Admin',
        };
    }

    public function getColor(): string|array|null
    {
        return match($this->value) {
            'user' => 'success',
            'admin' => 'info',
        };
    }
}
