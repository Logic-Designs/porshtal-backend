<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            Product::create([
                'id' => (string) Str::uuid(),
                'name' => 'Product 12',
                'description' => 'Description for product 12',
                'price' => 100.00,
            ]);

            Product::create([
                'id' => (string) Str::uuid(),
                'name' => 'Product 13',
                'description' => 'Description for product 13',
                'price' => 150.00,
            ]);

    }
}
