<?php

namespace Backpack\Base\app\Models;

use App\User;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

class BackpackUser extends User
{
    protected $table = 'users';

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Build the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->line([
                trans('backpack.base.password_reset.line_1'),
                trans('backpack.base.password_reset.line_2'),
            ])
            ->action(trans('backpack.base.password_reset.button'), url(config('backpack.base.route_prefix').'/password/reset', $this->token))
            ->line(trans('backpack.base.password_reset.notice'));
    }
}
