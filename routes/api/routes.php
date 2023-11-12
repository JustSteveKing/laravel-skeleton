<?php

declare(strict_types=1);

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get(
    'health',
    static fn() => new JsonResponse(['service' => 'online']),
)->name('health:check');
