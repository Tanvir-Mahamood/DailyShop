<?php
/*
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        Product::create([
            'name' => 'Product1',
            'description' => 'Description for product1',
            'img_url' => 'data:image/png;base64,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',

        ]);
        Product::create([
            'name' => 'Product2',
            'description' => 'Description for product2',
            'img_url' => 'data:image/png;base64,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',
            
        ]);
    }
    
}*/


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of product 1.',
            'image_url' => 'https://via.placeholder.com/150',
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description of product 2.',
            'image_url' => 'https://via.placeholder.com/150',
        ]);
    }
}
