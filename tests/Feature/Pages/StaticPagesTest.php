<?php

declare(strict_types=1);

use function Pest\Laravel\get;

test('that the home page loads', function (): void {
    get(
        uri: '/',
    )->assertOk();
});
