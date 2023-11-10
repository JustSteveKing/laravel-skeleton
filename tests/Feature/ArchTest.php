<?php

declare(strict_types=1);

test('that no debug statements have been left')
    ->expect(['dd', 'dump', 'die'])
    ->not->toBeUsed();
