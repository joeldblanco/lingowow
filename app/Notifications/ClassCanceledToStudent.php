<?php

namespace App\Notifications;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClassCanceledToStudent extends Notification implements ShouldQueue
{
    use Queueable;

    public $student, $schedule_string, $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course_id)
    {
        $this->course = Course::find($course_id)->select('course_name')->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->subject('Unenrollment notice!')
                    ->line('Greetings, dear '.$notifiable->first_name.' '.$notifiable->last_name.'.')
                    ->line('We are writing to notify you that you have been unenroled from '.$this->course->course_name)
                    ->line('Click the button below to check your current schedule.')
                    ->action('Check Schedule', url('/dashboard'))
                    ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        return [
           //
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
}
