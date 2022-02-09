<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClassCanceledToTeacher extends Notification implements ShouldQueue
{
    use Queueable;

    public $student, $schedule_string;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student,$deleted_schedule)
    {
        $this->student = $student;
        $schedule = json_decode($deleted_schedule->selected_schedule);
        $schedule_string = "";
        $days = ["Sundays","Mondays","Tuesdays","Wednesdays","Thursdays","Fridays","Saturdays"];

        // dd($deleted_schedule);

        for($i = 0; $i < count($schedule); $i++){
            $schedule[$i][0] = $schedule[$i][0].':00';
            $schedule[$i][1] = $days[intval($schedule[$i][1])];

            
            if($i == (count($schedule)-1)){
                $schedule_string = substr_replace($schedule_string,"", -2);
                $schedule_string .= " and ".$schedule[$i][1]." at ".$schedule[$i][0].", ";
            }else{
                $schedule_string .= "on ".$schedule[$i][1]." at ".$schedule[$i][0].", ";
            }
        }
        $schedule_string = substr_replace($schedule_string,"", -2);
        // $schedule_string .= ".";

        $this->schedule_string = $schedule_string;
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
                    ->subject('New Available Block!')
                    ->line('Greetings, dear '.$notifiable->first_name.' '.$notifiable->last_name.'.')
                    ->line('We are writing to notify you that student '.$this->student->first_name.' '.$this->student->last_name.' will not continue with his classes, which leaves your blocks '.$this->schedule_string.' free.')
                    ->line('Click the button below to check your current schedule.')
                    ->action('Check Schedule', url('/dashboard'))
                    ->line('If you have any questions, please contact us through the regular channels.');
    }

    public function toDatabase()
    {
        return [
            $this->student->id,
            $this->schedule_string
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
