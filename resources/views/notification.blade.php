<x-app-layout>
    @php
        $notification = DB::table('notifications')
            ->where('id', $id)
            ->get();
        $notification = $notification[0];
        
        DB::table('notifications')
            ->where('id', $id)
            ->update(['read_at' => now()]);
        
        $notification->type = explode('\\', $notification->type);
        $notification->type = end($notification->type);
        
        $notification->data = json_decode($notification->data, 1);
        $user = App\Models\User::find($notification->data['user_id']);
        if (array_key_exists('schedule_string', $notification->data)) {
            $notification->data['schedule_string'] = str_replace('on ', '', $notification->data['schedule_string']);
        }
        
        switch ($notification->type) {
            case 'BookedClass':
                $notification_icon = 'fas fa-bookmark';
                $notification->data = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has booked a class ' . $notification->data['schedule_string'];
                break;
        
            case 'ClassRescheduled':
                $notification_icon = 'fas fa-calendar-alt';
                $notification->data = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has rescheduled a class. New schedule: ' . $notification->data['schedule_string'];
                break;
        
            case 'StudentUnrolment':
                $notification_icon = 'fas fa-calendar-alt';
                if (auth()->user()->roles[0]->name == 'student') {
                    $notification->data = 'You have been automatically unenroled from the course ' . $notification->data['course_name'];
                }
                break;
        
            case 'StudentUnrolmentToTeacher':
                $notification_icon = 'fas fa-calendar-alt';
                $notification->data = 'The student ' . $user->first_name . ' ' . $user->last_name . ' has been automatically unenroled from course ' . $notification->data['course_name'] . ', which leaves your blocks ' . $notification->data['schedule_string'] . ' free.';
                break;
        
            default:
                $notification_icon = 'fas fa-bell';
                $notification->data = 'You have a new notification.';
                break;
        }
        
        $friends = DB::table('friend_requests')
            ->where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->get();
        foreach ($friends as $key => $value) {
            $value->sender_id == $user->id ? ($friends[$key] = $value->receiver_id) : ($friends[$key] = $value->sender_id);
        }
        
    @endphp

    <div class="p-4 bg-gray-200 font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                {{-- {{dd($notification)}} --}}
                <table
                    class="flex m-auto w-3/4 justify-center border-collapse table-auto whitespace-no-wrap table-striped relative h-full">
                    <tbody class="flex flex-col bg-white p-10 rounded-xl w-full">
                        <tr class="text-gray-700 font-bold space-x-3 flex justify-around items-center pt-5 mb-5">
                            <td class="text-center border-gray-200 w-1/12">
                                <i class="{{ $notification_icon }} text-4xl"></i>
                            </td>
                            <td class="text-center font-normal border-gray-200 w-10/12">
                                <p>{{ $notification->data }}</p>
                                <div class="text-xs text-gray-500 pt-3 float-right">
                                    {{ (new Carbon\Carbon($notification->created_at))->diffForHumans() }}
                                </div>
                            </td>
                            @if (!$notification->read_at)
                                <td class="flex flex-row justify-center items-center text-blue-700 text-sm w-1/12">
                                    <i class="fas fa-circle"></i>
                                </td>
                            @endif
                        </tr>
                        @if ($notification->type == 'BookedClass' || $notification->type == 'ClassRescheduled'))
                            <tr
                                class="text-gray-700 font-bold space-x-3 flex justify-around items-center pt-5 border-t-2">
                                <td class="text-center border-gray-200 w-full">
                                    <div class="w-full rounded-2xl border border-gray-200 p-4 flex flex-row shadow-xl">
                                        <a href="{{ route('profile.show', $user->id) }}"
                                            class="flex flex-row space-x-3 rounded-2xl w-5/6">
                                            <div class="w-1/6 rounded-2xl"
                                                style="background-image: url('{{ Storage::url($user->profile_photo_path) }}'); background-size: cover;">
                                                <img src="{{ Storage::url($user->profile_photo_path) }}" alt="pp"
                                                    class="rounded-2xl">
                                            </div>
                                            <div class="w-4/6 flex flex-col items-start justify-between p-3">
                                                <div>
                                                    <p class="text-xl">{{ $user->first_name }}
                                                        {{ $user->last_name }}</p>
                                                </div>
                                                <div class="flex space-x-3 items-center">
                                                    <i class="fas fa-user-friends"></i>
                                                    <p>{{ count($friends) }} @if (count($friends) == 1)
                                                            Friend
                                                        @else
                                                            Friends
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="w-1/6 flex flex-col justify-end">
                                            <div
                                                class="flex flex-col justify-center rounded-full h-12 border border-gray-500 cursor-pointer hover:bg-gray-900 hover:text-gray-300 transition ease-in duration-200">
                                                <p>Add Friend</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
