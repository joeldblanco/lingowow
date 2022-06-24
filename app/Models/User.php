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
        'name',
        'email',
        'password',
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
        return $this->hasManyThrough(Classes::class, Enrolment::class, 'student_id');
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
        $friends = DB::table('friend_requests')->where('status',1)->where('sender_id',auth()->id())->orWhere('receiver_id',auth()->id())->get();
        $friends_list = [];

        foreach($friends as $friend){
            if($friend->sender_id == auth()->id()){
                $friends_list[] = User::find($friend->receiver_id);
            }else{
                $friends_list[] = User::find($friend->sender_id);
            }
        }

        return $friends_list;
    }

    /**
     * Get all the user's friend requests.
     */
    public function friend_requests()
    {
        $friend_requests = DB::table('friend_requests')->where('status',NULL)->where('sender_id',auth()->id())->orWhere('receiver_id',auth()->id())->get();
        $friend_requests_list = [];

        foreach($friend_requests as $friend_request){
            if($friend_request->sender_id == auth()->id()){
                $friend_requests_list[] = User::find($friend_request->receiver_id);
            }else{
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

}
