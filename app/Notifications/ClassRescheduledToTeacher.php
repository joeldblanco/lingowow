<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ClassRescheduledToTeacher extends Notification implements ShouldQueue
{
    use Queueable;

    public $student, $classNewDate, $classOldDate;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student, $classOldDate, $classNewDate)
    {
        $this->student = $student;
        // $schedule = $student->schedules->first()->selected_schedule;
        // $schedule_string = "";
        // $days = ["Sundays", "Mondays", "Tuesdays", "Wednesdays", "Thursdays", "Fridays", "Saturdays"];

        // for ($i = 0; $i < count($schedule); $i++) {
        //     $schedule[$i][0] = $schedule[$i][0] . ':00';
        //     $schedule[$i][1] = $days[intval($schedule[$i][1])];


        //     if ($i == (count($schedule) - 1)) {
        //         $schedule_string = substr_replace($schedule_string, "", -2);
        //         $schedule_string .= " and " . $schedule[$i][1] . " at " . $schedule[$i][0] . ", ";
        //     } else {
        //         $schedule_string .= "on " . $schedule[$i][1] . " at " . $schedule[$i][0] . ", ";
        //     }
        // }
        // $schedule_string = substr_replace($schedule_string, "", -2);
        // $schedule_string .= ".";

        $this->classOldDate = $classOldDate;
        $this->classNewDate = $classNewDate;
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
            ->subject('Class Rescheduled: ' . $this->student->first_name . ' ' . $this->student->last_name)
            ->line('Greetings, dear ' . $notifiable->first_name . ' ' . $notifiable->last_name . '.')
            ->line('We are writing to notify you that a class has been rescheduled by student ' . $this->student->first_name . ' ' . $this->student->last_name . ' from ' . $this->classOldDate . ' to ' . $this->classNewDate)
            ->line('Click the button below to check your classes.')
            ->action('Classes', route('classes.index'))
            ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        return [
            "user_id" => $this->student->id,
            "schedule_string" => 'from ' . $this->classOldDate . ' to ' . $this->classNewDate,
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
