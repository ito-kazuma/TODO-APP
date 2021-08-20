<?php

namespace App\Models;

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function folders()
    {
      return $this->hasMany('App\Models\folder');
    }

    /**
    * パスワード再設定メール送信する
    */
    public function sendPasswordResetNotification($token)
    {
      Mail::to($this)->send(new ResetPassword($token));
    }

    public function comments()
    {
      return $this->hasMany('App\Models\Comment');
    }
}
