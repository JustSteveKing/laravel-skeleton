<?php

declare(strict_types=1);

use Illuminate\Testing\Fluent\AssertableJson;
use function Pest\Laravel\getJson;

it('can get the payload back from the health check endpoint', function (): void {
    getJson(
        uri: route('health:check'),
    )->assertOk()->assertJson(fn (AssertableJson $json) => $json
        ->where('service', 'online')
        ->etc(),
    );
});
