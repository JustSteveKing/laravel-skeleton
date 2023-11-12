<?php

declare(strict_types=1);

namespace App\Notifications\Accounts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class SendInviteEmail extends Notification
{
    use Queueable;

    public function __construct(
        public readonly string $token,
        public readonly string $name,
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('You have been invited!')
            ->line("You have been invited to join the {$this->name} account.")
            ->line('Use the link below to accept the invite, otherwise it will expire later anyway.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
