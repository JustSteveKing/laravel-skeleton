<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Account;
use App\Models\AccountInvite;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class AccountInviteFactory extends Factory
{
    protected $model = AccountInvite::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->companyEmail(),
            'token' => Str::random(),
            'account_id' => Account::factory(),
            'user_id' => User::factory(),
            'expires_at' => $this->faker->boolean()
                ? now()->addWeeks(3) : null,
        ];
    }
}
