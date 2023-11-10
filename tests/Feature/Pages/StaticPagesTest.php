<?php

declare(strict_types=1);

use function Pest\Laravel\get;

it('can get the home page', function (): void {
    get(
        uri: '/',
    )->assertOk();
});
