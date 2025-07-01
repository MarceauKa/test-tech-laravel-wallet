<?php

namespace App\Notifications;

use App\Models\Wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LowBalanceWallet extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct() {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Your wallet balance is low.')
            ->action('See my wallet', route('dashboard'))
            ->subject('🚨 Wallet balance is low')
            // @todo Review the alert message
            ->line("You're receiving this alert because your wallet balance is below the threshold set in the application. Please consider adding funds to your wallet to continue using our services without interruption.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
