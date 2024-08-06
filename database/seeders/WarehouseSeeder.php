<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id');

        foreach (range(1, 20) as $index) {
            Warehouse::create([
                'id' => (string) Str::uuid(),
                'name' => 'Warehouse ' . $index,
                'location' => 'Location ' . $index,
                'manager_id' => $userIds->random(), // Assuming you have users with UUIDs
            ]);
        }
    }
}
