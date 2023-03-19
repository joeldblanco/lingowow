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

class BookedClass extends Notification implements ShouldQueue
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
        $this->student = User::find($student_id)->first();
        $schedule = Schedule::select('selected_schedule')
            ->where('user_id', $student_id)
            ->first();

        $result = [];


        if (!empty($schedule)) {
            $schedule = $schedule->selected_schedule;

            foreach ($schedule as $block) {
                $day = Carbon::now()
                    ->startOfWeek()
                    ->addDays($block[0]);
                $hora = Carbon::createFromTime($block[1], 0, 0);
                $date = $day->setTime($hora->hour, $hora->minute);
                $result[] = $date->englishDayOfWeek . 's at ' . $date->format('h:i A');
            }

            $qty = count($result);
            $lasts = array_pop($result);
            $schedule_string = 'New class booked ';

            if ($qty > 1) {
                $schedule_string .= implode(', ', $result) . " and $lasts";
            } else {
                $schedule_string .= $lasts;
            }
            $schedule_string .= ".";

            $this->schedule_string = $schedule_string;
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
            ->subject('New Class Booked: ' . $this->student->first_name . ' ' . $this->student->last_name)
            ->line('Greetings, dear ' . $notifiable->first_name . ' ' . $notifiable->last_name . '.')
            ->line('We are writing to notify you that a new class has been scheduled by student ' . $this->student->first_name . ' ' . $this->student->last_name . ' ' . $this->schedule_string)
            ->line('Click the button below to check your current schedule.')
            ->action('Check Schedule', url('/dashboard'))
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
