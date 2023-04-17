<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'latitude',
        'longitude',
        'photo_url',
        'cover_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'photo_url'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['photo'];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail); // my notification
    }

    public function generateCode()
    {
        $code = rand(1000, 9999);

        UserCode::updateOrCreate(
            [ 'user_id' => auth()->id() ],
            [ 'code' => $code ]
        );

        try {

            $details = [
                'title' => 'Mail from shouts.dev',
                'code' => $code
            ];

            Mail::to(auth()->user()->email)->send(new SendCodeMail($details));

        } catch (\Exception $e) {
            info("Error: ". $e->getMessage());
            dd($e);
        }
    }

    public function getPhotoAttribute()
    {
        return getDefaultPhotoUser($this->attributes['photo_url']);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
    }

    public function isFollowing(User $user)
    {
        return !is_null($this->followings()->where('leader_id', $user->id)->first());
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
    }
}
