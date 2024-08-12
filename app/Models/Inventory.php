<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'id',
        'product_id',
        'warehouse_id',
        'quantity',
        'serial_number',
        'location_id',
    ];

    protected $casts = [
        'id' => 'string',
        'product_id' => 'string',
        'warehouse_id' => 'string',
        'location_id' => 'string',
    ];

        // Define the key type as uuid and disable auto increment
        protected $keyType = 'uuid';
        public $incrementing = false;


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function location()
    {
        return $this->belongsTo(InventoryLocation::class);
    }
}
