<?php

declare(strict_types=1);

use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

uses(
    TestCase::class,
    FastRefreshDatabase::class,
)->in('Feature');
