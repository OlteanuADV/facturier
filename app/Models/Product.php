<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'name',
        'description',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['search'] ?? null, function ($query, $search) {
    //         $query->where('name', 'like', '%' . $search . '%')
    //             ->orWhere('description', 'like', '%' . $search . '%');
    //     });
    // }

    // public function scopeSort($query, array $sort)
    // {
    //     $query->when($sort['column'] ?? null, function ($query, $column) use ($sort) {
    //         $query->orderBy($column, $sort['direction'] ?? 'asc');
    //     });
    // }
}
