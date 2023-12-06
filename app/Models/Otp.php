<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp',
        'expires_at',
        'is_verified',
        'verified_at',
        'ip_address',
    ];
    
    protected $dates = [
        'expires_at',
        'verified_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
