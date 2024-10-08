<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            Supplier::create([
                'name' => "Supplier $i",
                'email' => "supplier$i@example.com",
                'phone_number' => '123456789' . $i,
            ]);
        }
    }
}
