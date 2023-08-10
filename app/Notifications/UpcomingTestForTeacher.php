<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;


class UpcomingTestForTeacher extends Notification implements ShouldQueue
{
    use Queueable;

    public $student;
    public $timeUntilTest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($class)
    {
        $this->student = $class->student();
        $this->timeUntilTest = (new Carbon($class->start_date))->diffForHumans();
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
            ->subject('Upcoming test: ' . $this->student->first_name . ' ' . $this->student->last_name)
            ->line('Greetings, dear ' . $notifiable->first_name . ' ' . $notifiable->last_name . '.')
            ->line('We are writing to notify you that your next test is in ' . $this->timeUntilTest . ', with student ' . $this->student->first_name . ' ' . $this->student->last_name . '.')
            ->line('Click on the button below to access the student\'s classroom.')
            ->action('Classroom', route('classroom', $this->student->id))
            ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        return [
            "user_id" => $this->student->id,
            "timeUntilTest" => $this->timeUntilTest
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
