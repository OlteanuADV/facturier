<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'user_id',
        'role'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
