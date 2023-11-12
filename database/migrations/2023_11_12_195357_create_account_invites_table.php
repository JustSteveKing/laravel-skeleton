<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('account_invites', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('email');
            $table->string('token');

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

            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->unique(['email', 'account_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account_invites');
    }
};
