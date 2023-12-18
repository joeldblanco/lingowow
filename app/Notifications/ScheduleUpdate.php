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

class ScheduleUpdate extends Notification implements ShouldQueue
{
    use Queueable;

    public $student;
    public $schedule_string;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student_id)
    {
        $this->student = User::find($student_id);
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
                $hour = Carbon::createFromTime($block[1], 0, 0);
                $date = $day->setTime($hour->hour, $hour->minute);
                $result[] = $date->englishDayOfWeek . 's at ' . $date->format('h:i A');
            }

            $qty = count($result);
            $last = array_pop($result);
            $schedule_string = 'Your student ' . $this->student->first_name . ' ' . $this->student->last_name . '\'s schedule has been updated with the following class times: ';

            if ($qty > 1) {
                $schedule_string .= implode(', ', $result) . ", and $last";
            } else {
                $schedule_string .= $last;
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
            ->subject('Schedule Update for ' . $this->student->first_name . ' ' . $this->student->last_name)
            ->line('Hello, ' . $notifiable->first_name . ' ' . $notifiable->last_name . '.')
            ->line($this->schedule_string)
            ->line('Please review your updated schedule by clicking the button below:')
            ->action('Check Schedule', route('dashboard'))
            ->line('If you have any questions or concerns, please contact us through the usual channels.');
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
