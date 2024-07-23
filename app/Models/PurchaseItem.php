<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'purchase_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

    protected $keyType = 'uuid';
    public $incrementing = false;

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted()
    {
        static::creating(function ($purchaseItem) {
            $purchaseItem->id = (string) Str::uuid();
            $purchaseItem->unit_price = $purchaseItem->product->price;
            $purchaseItem->total_price = $purchaseItem->quantity * $purchaseItem->unit_price;
        });

        static::updating(function ($purchaseItem) {
            $purchaseItem->total_price = $purchaseItem->quantity * $purchaseItem->unit_price;
        });

        static::created(function ($purchaseItem) {
            $purchaseItem->updateTotalAmount();
        });

        static::updated(function ($purchaseItem) {
            $purchaseItem->updateTotalAmount();
        });

        static::deleted(function ($purchaseItem) {
            $purchaseItem->updateTotalAmount();
        });
    }

    public function updateTotalAmount()
    {
        $totalAmount = $this->purchase->items()->sum('total_price');
        $this->purchase->update(['total_amount' => $totalAmount]);
    }
}
