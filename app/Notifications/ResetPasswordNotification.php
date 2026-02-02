<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    // Menghubungkan token dari sistem ke email
    public function __construct(public string $token)
    {
        //
    }

    // Menentukan pengiriman via Email
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    // Logic pengiriman email
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->email,
        ], false));

        // Mengarahkan tampilan ke file blade khusus agar tidak bocor kodenya
        return (new MailMessage)
            ->subject('Reset Kata Sandi Akun Anda - SDN Bringin 01')
            ->view('auth.mail_custom', [
                'url' => $url,
                'name' => $notifiable->name ?? 'Pengguna'
            ]);
    }

    public function toArray(object $notifiable): array
    {
        return [];
    }
}