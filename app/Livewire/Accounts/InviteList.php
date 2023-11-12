<?php

declare(strict_types=1);

namespace App\Livewire\Accounts;

use App\Models\Account;
use App\Models\AccountInvite;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class InviteList extends Component
{
    public Account $account;

    public function render(): View
    {
        return view('livewire.accounts.invite-list', [
            'invites' => AccountInvite::query()->where(
                'account_id',
                $this->account->id,
            )->get(),
        ]);
    }
}
