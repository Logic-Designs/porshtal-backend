<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'warehouse_id',
        'location_code',
        'description',
    ];

    protected $casts = [
        'id' => 'string',
        'warehouse_id' => 'string',
    ];

    // Define the key type as uuid and disable auto increment
    protected $keyType = 'uuid';
    public $incrementing = false;

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
