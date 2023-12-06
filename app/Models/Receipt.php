<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;

    // 6.1 Creare table denumita receipts, ce va contine coloanele: company_id, client_id, user_id, serie, number, date, total, currency
    protected $fillable = [
        'company_id',
        'client_id',
        'user_id',
        'invoice_id',
        'serie',
        'number',
        'date',
        'total',
        'currency',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
