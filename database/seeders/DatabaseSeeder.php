<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('    ---------------------------------------');
        $this->command->info('      Started Database Seeding ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');

        $this->call([
            UserSeeder::class,
            IngredientsTableSeeder::class,
            StatusesTableSeeder::class,
            ProductsTableSeeder::class,
        ]);
    }
}
