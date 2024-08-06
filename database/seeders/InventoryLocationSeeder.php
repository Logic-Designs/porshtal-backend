<?php

namespace Database\Seeders;

use App\Models\InventoryLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InventoryLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouseIds = \App\Models\Warehouse::pluck('id');

        foreach (range(1, 20) as $index) {
            InventoryLocation::create([
                'id' => (string) Str::uuid(),
                'warehouse_id' => $warehouseIds->random(), // Randomly assign a warehouse
                'location_code' => 'LOC-' . $index,
                'description' => 'Description for location ' . $index,
            ]);
        }
    }
}
