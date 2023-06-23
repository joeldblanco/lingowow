<?php

namespace App\Notifications;

use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class BookedPlacementTest extends Notification implements ShouldQueue
{
    use Queueable;

    public $student, $schedule_string;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student_id)
    {
        $this->student = User::find($student_id);
        $examDate = Carbon::parse(session('examDate')[0]);
        $this->schedule_string = 'Placement test booked on ' . $examDate->format('Y/d/m') . ' at ' . $examDate->format('g:i a') . ' UTC.';
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
            ->subject('New Placement Test Booked: ' . $this->student->first_name . ' ' . $this->student->last_name)
            ->line('Greetings, dear ' . $notifiable->first_name . ' ' . $notifiable->last_name . '.')
            ->line('We are writing to notify you that a new Placement Test has been scheduled by student ' . $this->student->first_name . ' ' . $this->student->last_name . '. ' . $this->schedule_string)
            ->line('Click the button below to check your current schedule.')
            ->action('Check Schedule', route('dashboard'))
            ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        return [
            "user_id" => $this->student->id,
            "schedule_string" => $this->schedule_string
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
