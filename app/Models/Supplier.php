<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone_number',
    ];

    // Define the key type as uuid and disable auto increment
    protected $keyType = 'uuid';
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($supplier) {
            if (is_null($supplier->id)) {
                $supplier->id = (string) Str::uuid();
            }
        });
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
