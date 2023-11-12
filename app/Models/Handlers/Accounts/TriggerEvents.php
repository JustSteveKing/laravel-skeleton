<?php

declare(strict_types=1);

namespace App\Models\Handlers\Accounts;

use App\Events\Accounts\InviteCreated;
use App\Models\AccountInvite;

final class TriggerEvents
{
    public function __construct(AccountInvite $invite)
    {
        event(new InviteCreated(invite: $invite->id));
    }
}
