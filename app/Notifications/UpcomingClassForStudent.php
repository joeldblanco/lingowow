<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class UpcomingClassForStudent extends Notification implements ShouldQueue
{
    use Queueable;

    public $teacher;
    public $timeUntilClass;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($class)
    {
        $this->teacher = $class->teacher();
        $this->timeUntilClass = (new Carbon($class->start_date))->diffForHumans();
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
            ->subject('Upcoming class')
            ->line('Greetings, dear ' . $notifiable->first_name . ' ' . $notifiable->last_name . '.')
            ->line('We are writing to remind you that your next class is in ' . $this->timeUntilClass . ', with teacher ' . $this->teacher->first_name . ' ' . $this->teacher->last_name . '.')
            ->line('Click on the button below to access to your classroom.')
            ->action('Classroom', route('classroom', $notifiable->id))
            ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        return [
            "user_id" => $this->teacher->id,
            "timeUntilClass" => $this->timeUntilClass
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
        return [
            //
        ];
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
