<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ExamScheduledToTeacher extends Notification implements ShouldQueue
{
    use Queueable;

    public $student, $examDateTime;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student, $examDateTime)
    {
        $this->student = $student;
        $this->examDateTime = $examDateTime;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $this->examDateTime->setTimezone($notifiable->timezone);

        return (new MailMessage)
            ->subject('New Placement Test Scheduled!')
            ->line('Greetings, dear ' . $notifiable->first_name . ' ' . $notifiable->last_name . '.')
            ->line('We are writing to notify you that a new placement test has been scheduled with you by ' . $this->student->first_name . ' ' . $this->student->last_name . ' on ' . $this->examDateTime . '.')
            ->line('Click on the button below to check your notifications.')
            ->action('Notifications', route('notifications.index'))
            ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        //
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
