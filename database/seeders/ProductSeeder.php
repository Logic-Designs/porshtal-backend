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
        $users = User::all();
        $count = 1;
        foreach($users as $user){
            Product::create([
                'id' => (string) Str::uuid(),
                'user_id' => $user->id,
                'name' => 'Product '. $count,
                'description' => 'Description for product '. $count++,
                'price' => 100.00,
            ]);

            Product::create([
                'id' => (string) Str::uuid(),
                'user_id' => $user->id,
                'name' => 'Product '. $count,
                'description' => 'Description for product '. $count++,
                'price' => 150.00,
            ]);
        }

    }
}
