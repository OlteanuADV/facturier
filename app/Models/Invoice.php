<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'client_id',
        'user_id',
        'serie',
        'number',
        'date',
        'due_date',
        'total',
        'currency',
        'status',
        'description',
        'pdf',
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

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price', 'discount', 'total');
    }

    public function scopeFilter($query, $search)
    {
        if ($search) {
            $query->where('number', 'like', '%' . $search . '%')
                ->orWhere('serie', 'like', '%' . $search . '%')
                ->orWhere('date', 'like', '%' . $search . '%')
                ->orWhere('due_date', 'like', '%' . $search . '%')
                ->orWhere('total', 'like', '%' . $search . '%')
                ->orWhere('currency', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('client', function ($query) use ($search) {
                    $query->where('denumire', 'like', '%' . $search . '%')
                        ->orWhere('cui', 'like', '%' . $search . '%')
                        ->orWhere('adresa', 'like', '%' . $search . '%');
                });
            return $query;
        }
    }

    public function scopeSort($query, $field, $direction)
    {
        $query->orderBy($field, $direction);
    }
}
