<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use aberkanidev\Coupons\Traits\CanRedeemCoupons;
use App\Http\Livewire\Chat;
use Illuminate\Support\Facades\DB;
use Lab404\Impersonate\Models\Impersonate;
use Lab404\Impersonate\Services\ImpersonateManager;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use SoftDeletes;
    use CanRedeemCoupons;
    use Impersonate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'status',
        'street',
        'city',
        'zip_code',
        'country',
        'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->email;

        // Return email address and name...
        // return [$this->email_address => $this->name];
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class)->orderBy('module_id');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class)->orderBy('unit_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    // public function impersonate(User $user, $guardName = 'web')
    // {
    //     return app(ImpersonateManager::class)->take($this, $user, $guardName);
    // }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'post_like');
    }

    /**
     * @return  bool
     */
    public function canImpersonate()
    {
        return $this->roles[0]->name == "admin";
    }

    /*
     * @return bool
     */
    public function canBeImpersonated()
    {
        return $this->roles[0]->name == ("teacher" || "student" || "guest");
    }

    /**
     * Get all the student's classes.
     */
    public function studentClasses()
    {
        return $this->hasManyThrough(Classes::class, Enrolment::class, 'student_id')->withTrashedParents();
    }

    public function studentsSchedules()
    {
        $enrolments = $this->enrolments_teacher()->whereNotNull('student_id')->get();
        $schedules = [];
        $Students_schedules = [];
        foreach($enrolments as $enrolment){
            $schedules[] = $enrolment->schedule->selected_schedule;
        }
        foreach($schedules as $schedule){
            foreach($schedule as $days){
                // dd(array_map(function($element) { return json_encode($element); }, $schedule));
                $Students_schedules[] = $days;
            }
        }
        // dd($enrolments, $schedules, $Students_schedules);
        return $Students_schedules;
    }

    /**
     * Get all the teacher's classes.
     */
    public function teacherClasses()
    {
        return $this->hasManyThrough(Classes::class, Enrolment::class, 'teacher_id');
    }

    /**
     * Get all the user's friends.
     */
    public function friends()
    {
        $friends = DB::table('friends')->where('status', 1)->where(function ($query) {
            $query->where('user_id', $this->id)->orWhere('friend_id', $this->id);
        })->get();
        // $friends_list = [];

        foreach ($friends as $key => $value) {
            if ($value->user_id == $this->id) {
                $friends[$key] = User::withTrashed()->find($value->friend_id);
            } else {
                $friends[$key] = User::withTrashed()->find($value->user_id);
            }
        }

        return $friends;

        // return $this->hasMany(Friend::class)->where('status',1);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class)->withPivot('color', 'active')->withTimestamps();
    }

    public function UnreadConversations()
    {
        $unread_conversations = 0;
        foreach ($this->conversations as $conversation) {
            if ($conversation->unread_messages > 0) {
                $unread_conversations++;
            }
        }

        return $unread_conversations;
    }

    /**
     * Get all the user's friend requests.
     */
    public function friend_requests()
    {
        $friend_requests = DB::table('friend_requests')->where('status', NULL)->where('sender_id', auth()->id())->orWhere('receiver_id', auth()->id())->get();
        $friend_requests_list = [];

        foreach ($friend_requests as $friend_request) {
            if ($friend_request->sender_id == auth()->id()) {
                $friend_requests_list[] = User::find($friend_request->receiver_id);
            } else {
                $friend_requests_list[] = User::find($friend_request->sender_id);
            }
        }

        return $friend_requests_list;
    }

    /**
     * Get all the user's posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * The activities associated with the user.
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_user', 'user_id', 'activity_id');
    }

    /**
     * Get all the user's enrolments.
     */
    public function enrolments()
    {
        return $this->hasMany(Enrolment::class, 'student_id');
    }

    public function enrolments_teacher()
    {
        return $this->hasMany(Enrolment::class, 'teacher_id');
    }

    public function personalMeeting($user_id)
    {
        if (auth()->user()->getRoleNames()->first() == "admin") {
            return Meeting::where('atendee_id', $user_id)->first() == null ? "#" : (Meeting::where('atendee_id', $user_id)->first())->join_url;
        } else {
            return Meeting::where('atendee_id', $user_id)->first() == null ? "#" : (Meeting::where('atendee_id', $user_id)->first())->join_url;
        }
    }
}
