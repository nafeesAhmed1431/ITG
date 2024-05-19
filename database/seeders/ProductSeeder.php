<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_no' => '1',
                'name' => 'Product 1',
                'description' => 'Description for product 1',
                'unit' => 'pcs',
                'purchase_rate' => 10.50,
                'sale_rate' => 12.50,
                'sale_rate_2' => 11.50,
                'sale_rate_3' => 13.00,
                'stock_alert' => 5,
                'group' => 'Group A',
                'lock' => false,
                'location' => 'Warehouse 1',
            ],
            [
                'product_no' => '2',
                'name' => 'Product 2',
                'description' => 'Description for product 2',
                'unit' => 'pcs',
                'purchase_rate' => 20.00,
                'sale_rate' => 25.00,
                'sale_rate_2' => 23.00,
                'sale_rate_3' => 27.00,
                'stock_alert' => 10,
                'group' => 'Group B',
                'lock' => false,
                'location' => 'Warehouse 2',
                
            ],
            [
                'product_no' => '3',
                'name' => 'Product 3',
                'description' => 'Description for product 3',
                'unit' => 'pcs',
                'purchase_rate' => 15.75,
                'sale_rate' => 18.00,
                'sale_rate_2' => 17.00,
                'sale_rate_3' => 19.00,
                'stock_alert' => 7,
                'group' => 'Group A',
                'lock' => false,
                'location' => 'Warehouse 1',
                
            ],
            [
                'product_no' => '4',
                'name' => 'Product 4',
                'description' => 'Description for product 4',
                'unit' => 'pcs',
                'purchase_rate' => 50.00,
                'sale_rate' => 60.00,
                'sale_rate_2' => 55.00,
                'sale_rate_3' => 65.00,
                'stock_alert' => 2,
                'group' => 'Group C',
                'lock' => false,
                'location' => 'Warehouse 3',
                
            ],
            [
                'product_no' => '5',
                'name' => 'Product 5',
                'description' => 'Description for product 5',
                'unit' => 'pcs',
                'purchase_rate' => 30.00,
                'sale_rate' => 35.00,
                'sale_rate_2' => 32.00,
                'sale_rate_3' => 37.00,
                'stock_alert' => 5,
                'group' => 'Group B',
                'lock' => false,
                'location' => 'Warehouse 2',
                
            ],
            [
                'product_no' => '6',
                'name' => 'Product 6',
                'description' => 'Description for product 6',
                'unit' => 'pcs',
                'purchase_rate' => 40.00,
                'sale_rate' => 45.00,
                'sale_rate_2' => 43.00,
                'sale_rate_3' => 48.00,
                'stock_alert' => 3,
                'group' => 'Group A',
                'lock' => false,
                'location' => 'Warehouse 1',
                
            ],
            [
                'product_no' => '7',
                'name' => 'Product 7',
                'description' => 'Description for product 7',
                'unit' => 'pcs',
                'purchase_rate' => 70.00,
                'sale_rate' => 80.00,
                'sale_rate_2' => 75.00,
                'sale_rate_3' => 85.00,
                'stock_alert' => 4,
                'group' => 'Group C',
                'lock' => false,
                'location' => 'Warehouse 3',
                
            ],
            [
                'product_no' => '8',
                'name' => 'Product 8',
                'description' => 'Description for product 8',
                'unit' => 'pcs',
                'purchase_rate' => 25.00,
                'sale_rate' => 30.00,
                'sale_rate_2' => 28.00,
                'sale_rate_3' => 32.00,
                'stock_alert' => 6,
                'group' => 'Group B',
                'lock' => false,
                'location' => 'Warehouse 2',
                
            ],
            [
                'product_no' => '9',
                'name' => 'Product 9',
                'description' => 'Description for product 9',
                'unit' => 'pcs',
                'purchase_rate' => 90.00,
                'sale_rate' => 100.00,
                'sale_rate_2' => 95.00,
                'sale_rate_3' => 105.00,
                'stock_alert' => 1,
                'group' => 'Group C',
                'lock' => false,
                'location' => 'Warehouse 3',
                
            ],
            [
                'product_no' => '10',
                'name' => 'Product 10',
                'description' => 'Description for product 10',
                'unit' => 'pcs',
                'purchase_rate' => 60.00,
                'sale_rate' => 70.00,
                'sale_rate_2' => 65.00,
                'sale_rate_3' => 75.00,
                'stock_alert' => 2,
                'group' => 'Group A',
                'lock' => false,
                'location' => 'Warehouse 1',
                
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
