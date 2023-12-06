<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cui',
        'denumire',
        'adresa',
        'numar_reg_com',
        'platitor_tva'
    ];

    protected $casts = [
        'platitor_tva' => 'boolean'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users')->withPivot('is_active');
    }
}
