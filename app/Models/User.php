<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Actions\SendOtpMail;
use App\Mail\OtpMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'facebook_id',
        'google_id',
        'role'
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function otp()
    {
        return $this->hasOne(Otp::class)->latestOfMany();
    }

    /** 
        * Get the companies for the user.
    */
    public function companies()
    {
        return $this->belongsToMany(Company::class, CompanyUser::class)->withPivot('is_active', 'role');
    }

    /**
     * Get the active company of the user.
    */
    public function company()
    {
        return $this->hasOneThrough(Company::class, CompanyUser::class, 'user_id', 'id', 'id', 'company_id')->where('is_active', 1);
    }

    // public function sendOtp()
    // {

    //     $otp = $this->otp;

    //     if(!is_null($otp))
    //     {
    //         if(!$otp->is_verified && strtotime($otp->expires_at) > time())
    //         {
    //             return;
    //         }
    //     }
        
    //     $otp = $this->otp()->create([
    //         'otp' => rand(100000, 999999),
    //         'expires_at' => now()->addMinutes(5),
    //         'ip_address' => request()->ip(),
    //     ]);
        
    //     SendOtpMail::dispatch($this->email, $otp->otp);
    // }
}
