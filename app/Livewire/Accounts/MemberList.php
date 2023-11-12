<?php

declare(strict_types=1);

namespace App\Livewire\Accounts;

use App\Models\Account;
use App\Models\Membership;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class MemberList extends Component
{
    public Account $account;

    public function render(): View
    {
        return view('livewire.accounts.member-list', [
            'members' => Membership::query()->where(
                'account_id',
                $this->account->id,
            )->get(),
        ]);
    }
}
