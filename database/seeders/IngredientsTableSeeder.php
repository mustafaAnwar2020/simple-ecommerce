<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('ingredients')->truncate();
        DB::table('ingredient_translations')->truncate();
        DB::table('stocks')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('ingredients')->insert([
            ['created_at' => now(), 'updated_at' => now()],
            ['created_at' => now(), 'updated_at' => now()],
            ['created_at' => now(), 'updated_at' => now()],
        ]);

        $ingredientTranslations = [
            ['ingredient_id' => 1, 'locale' => 'ar', 'name' => 'لحم بقري', 'created_at' => now(), 'updated_at' => now()],
            ['ingredient_id' => 1, 'locale' => 'en', 'name' => 'Beef', 'created_at' => now(), 'updated_at' => now()],
            ['ingredient_id' => 2, 'locale' => 'ar', 'name' => 'بصل', 'created_at' => now(), 'updated_at' => now()],
            ['ingredient_id' => 2, 'locale' => 'en', 'name' => 'Onion', 'created_at' => now(), 'updated_at' => now()],
            ['ingredient_id' => 3, 'locale' => 'ar', 'name' => 'جبن', 'created_at' => now(), 'updated_at' => now()],
            ['ingredient_id' => 3, 'locale' => 'en', 'name' => 'Cheese', 'created_at' => now(), 'updated_at' => now()],
        ];

        $ingredientStocks = [
            ['ingredient_id' => 1, 'stock' => '20', 'created_at' => now(), 'updated_at' => now()],
            ['ingredient_id' => 2, 'stock' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['ingredient_id' => 2, 'stock' => '5', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('ingredient_translations')->insert($ingredientTranslations);
        DB::table('stocks')->insert($ingredientStocks);
    }
}
