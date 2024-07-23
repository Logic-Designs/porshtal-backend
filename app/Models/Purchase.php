<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Purchase extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'id',
        'purchase_order_number',
        'supplier_id',
        'order_date',
        'expected_delivery_date',
        'total_amount',
        'status',
    ];

    // Define the key type as uuid and disable auto increment
    protected $keyType = 'uuid';
    public $incrementing = false;

    // Define the relationships
    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id');
    }

    public function items()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    // Boot method to define model event listeners
    protected static function booted()
    {
        static::creating(function ($purchase) {
            if (is_null($purchase->status)) {
                $purchase->status = self::STATUS_OPEN;
            }
            $purchase->id = (string) Str::uuid();
        });
    }

    // Define status constants
    const STATUS_OPEN = 'open';
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    // Function to update total amount
    public function updateTotalAmount()
    {
        $totalAmount = $this->items()->sum('total_price');
        $this->update(['total_amount' => $totalAmount]);
    }
}
