<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTables extends Migration
{
    public function up(): void
    {
        Schema::create('stats_events', static function (Blueprint $table): void {
            $table->id();

            $table->string('name');
            $table->string('type');
            $table->bigInteger('value');

            $table->timestamps();
        });
    }
}
