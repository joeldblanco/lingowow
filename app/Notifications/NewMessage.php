<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Broadcast;

class NewMessage extends Notification implements ShouldQueue
{
    use Queueable;

    public $text_message, $conversation_id, $unread_messages;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($text_message, $conversation_id)
    {
        $this->text_message = $text_message;
        $this->conversation_id = $conversation_id;

        $this->unread_messages = 0;
        $conversations = auth()->user()->conversations;
        foreach ($conversations as $conversation) {
            if ($conversation->unread_messages > 0) {
                $this->unread_messages++;
            }
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
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
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
        return new BroadcastMessage([
            'unread_messages' => $this->unread_messages,
            'text_message' => $this->text_message,
            'conversation_id' => $this->conversation_id,
        ]);
    }
}
