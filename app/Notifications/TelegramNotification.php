<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

use TelegramNotifications\TelegramChannel;
use TelegramNotifications\Messages\TelegramMessage;

class TelegramNotification extends Notification
{
    use Queueable;

    protected $arr;

    public function __construct(array $arr) {
        $this->arr = $arr;
    }

    public function via()
    {
        return [TelegramChannel::class];
    }

    public function toTelegram()
    {
        // to set any required or optional field use
        // setter, which name is field name in camelCase
        return (new TelegramMessage())
            ->text($this->arr['text'])
            ->disableNotification($this->arr['disable_notification']);
    }
}