<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'user_id' => 1,
                'name' => 'HeadPhone',
                'stock' => '10',
                'sale_price' => '1000',
                'sku' => '#dh34848',
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
