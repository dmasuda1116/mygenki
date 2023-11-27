<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;

class PasswordResetNotification extends ResetPassword
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            $url = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }

        return (new MailMessage)
            ->subject('[' . config('app.name') . ']パスワードリセット通知')

            ->line('いつもご利用ありがとうございます。')
            ->line('')
            ->line('あなたのアカウントのパスワードリセット要求を受信しました。')
            ->line('')
            ->line('以下の[リセットパスワード]ボタンをクリックし、パスワードを再設定してください。')
            ->line('')
            ->line('このパスワードリセットリンクは60分で期限切れになります。')

            ->action('リセットパスワード', $url)

            ->line('')
            ->line('[リセットパスワード]ボタンをクリックできない場合は、')
            ->line('')
            ->line('以下のURLをコピーしてウェブブラウザに貼り付けてください。')
            ->line('<' . $url . '>')

            ->markdown('stresscheck.email');
    }
}
