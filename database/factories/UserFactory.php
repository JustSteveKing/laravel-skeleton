<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Identity\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $email = $this->faker->unique()->companyEmail(),
            'role' => Role::USER,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'avatar' => "https://unavatar.io/{$email}",
            'email_verified_at' => now(),
        ];
    }

    public function role(Role $role): UserFactory
    {
        return $this->state(
            state: static fn(array $attributes): array => [
                'role' => $role,
            ],
        );
    }

    public function unverified(): UserFactory
    {
        return $this->state(
            state: static fn(array $attributes): array => [
                'email_verified_at' => null,
            ],
        );
    }
}
