<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifMhs extends Notification implements ShouldQueue
{
    use Queueable;
    public $user;
    public $organisasi;
    public $msg;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user ,$organisasi, $msg)
    {
        $this->user = $user;
        $this->organisasi = $organisasi;
        $this->msg = $msg;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'name' => $this->user->name,
            'organisasi_name' => $this->organisasi->name,
            'email' => $this->user->email,
            'msg' => $this->msg,
        ];
    }
}
