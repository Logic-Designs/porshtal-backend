<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'location',
        'manager_id',
    ];

    protected $casts = [
        'id' => 'string',
        'manager_id' => 'string',
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function inventoryLocations()
    {
        return $this->hasMany(InventoryLocation::class);
    }
}
