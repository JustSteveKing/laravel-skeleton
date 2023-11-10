<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Identity\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Steve McDougall',
            'email' => 'juststevemcd@gmail.com',
            'role' => Role::ADMIN,
        ]);
    }
}
