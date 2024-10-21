<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('ingredient_product')->truncate();
        DB::table('product_translations')->truncate();
        DB::table('products')->truncate();

        $products = [
            [
                'cost' => '100',
                'price' => '150',
                'sku' => '123456',
                'barcode' => '123456',
                'active' => 1,
                'discount' => 10,
                'discount_type' => 'percent',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        $productTranslations = [
            ['product_id' => 1, 'locale' => 'en', 'name' => 'Burger', 'description' => 'Burger 200gm', 'slug' => 'Burger-200-gm', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1, 'locale' => 'ar', 'name' => 'برجر', 'description' => 'برجر 200 جم', 'slug' => 'برجر-200-جم', 'created_at' => now(), 'updated_at' => now()],
            // Add more product translations as needed
        ];

        $ingredients = [
            1 => 150,
            2 => 20,
            3 => 30,
        ];

        DB::table('products')->insert($products);

        DB::table('product_translations')->insert($productTranslations);

        foreach ($ingredients as $ingredientId => $stock) {
            DB::table('ingredient_product')->insert([
                'product_id' => 1,
                'ingredient_id' => $ingredientId,
                'stock' => $stock,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
