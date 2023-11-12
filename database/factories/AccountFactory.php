<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Account\Status;
use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->company(),
            'slug' => Str::slug($name),
            'email' => $this->faker->unique()->companyEmail(),
            'status' => Status::PENDING,
            'logo' => $this->faker->imageUrl(word: $name),
            'user_id' => User::factory(),
        ];
    }
}
