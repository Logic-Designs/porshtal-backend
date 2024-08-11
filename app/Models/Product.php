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

}
