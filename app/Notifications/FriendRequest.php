<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class FriendRequest extends Notification
{
    use Queueable;

    public $sender, $receiver;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender_id, $receiver_id)
    {
        $this->sender = User::find($sender_id);
        $this->receiver = User::find($receiver_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->sender->first_name . ' ' . $this->sender->last_name . ' sent you a friend request!')
            ->line(new HtmlString('<strong>'.$this->sender->first_name . ' ' . $this->sender->last_name . '</strong> sent you a friend request!'))
            ->line('Click the button below to purchase another package and continue enjoying our services.')
            ->action('Profile', url('/profile/'.$this->receiver->id))
            ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        return [
            "user_id" => $this->sender->id,
            "friend_id" => $this->receiver->id
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([]);
    }
}
