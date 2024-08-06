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

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
