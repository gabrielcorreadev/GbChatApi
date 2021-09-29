<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    //    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->greeting(Lang::get('Olá!'))
            ->subject(Lang::get('Verifique o endereço de e-mail'))
            ->line(Lang::get('Clique no botão abaixo para verificar o seu endereço de e-mail.'))
            ->action(
                Lang::get('Verifique o endereço de e-mail'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::get('Se você não criou uma conta, nenhuma ação adicional é necessária.'));
    }
}
