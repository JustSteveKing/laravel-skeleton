<?php

declare(strict_types=1);

use App\Enums\Identity\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('memberships', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('role')->default(Role::USER->value);

            $table
                ->foreignUuid('account_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table
                ->foreignUuid('user_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
