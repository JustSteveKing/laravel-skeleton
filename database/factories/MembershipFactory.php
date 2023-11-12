<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Identity\Role;
use App\Models\Account;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

final class MembershipFactory extends Factory
{
    protected $model = Membership::class;

    public function definition(): array
    {
        return [
            'role' => Role::class,
            'account_id' => Account::factory(),
            'user_id' => User::factory(),
        ];
    }
}
