<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'price',
    ];

    protected $keyType = 'uuid';
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($product) {
            $product->id = (string) Str::uuid();
        });
    }

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
