<?php

declare(strict_types=1);

namespace App\Listeners\Accounts;

use App\Events\Accounts\InviteCreated;
use App\Models\AccountInvite;
use App\Notifications\Accounts\SendInviteEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

final class SendAccountInvite implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(InviteCreated $event): void
    {
        $invite = AccountInvite::query()->with(['account'])->findOrFail(
            id: $event->invite,
        );

        $invite->notify(new SendInviteEmail(
            token: $invite->token,
            name: $invite->account->name,
        ));
    }
}
