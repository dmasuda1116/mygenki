<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
        'gender',
        'generation',
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

    /**
     * Override to send for password reset notification.
     *
     * @param [type] $token
     * @return void
     */
    // パスワードリセットメールの送信
    // <https://qiita.com/daijin/items/8bc658c9b14cdd15260c>
    public function sendPasswordResetNotification($token)
    {
        Log::info('[Mail] ' . 'From:[' . config('mail.from.address') . '], To:[' . Auth::user() . '], Token:[' . $token . ']');
        $this->notify(new PasswordResetNotification($token));
    }

    public function isAdmin(): bool
    {
        if ($this->account_type === 'admin') {
            return true;
        } else {
            return false;
        }
    }
}
