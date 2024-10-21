<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('status_translations')->truncate();
        DB::table('statuses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $statuses = [
            ['code' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'processing', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'completed', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'cancelled', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('statuses')->insert($statuses);

        $statusTranslations = [
            ['status_id' => 1, 'locale' => 'en', 'name' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
            ['status_id' => 1, 'locale' => 'ar', 'name' => 'قيد الانتظار', 'created_at' => now(), 'updated_at' => now()],
            ['status_id' => 2, 'locale' => 'en', 'name' => 'Processing', 'created_at' => now(), 'updated_at' => now()],
            ['status_id' => 2, 'locale' => 'ar', 'name' => 'قيد المعالجة', 'created_at' => now(), 'updated_at' => now()],
            ['status_id' => 3, 'locale' => 'en', 'name' => 'Completed', 'created_at' => now(), 'updated_at' => now()],
            ['status_id' => 3, 'locale' => 'ar', 'name' => 'مكتمل', 'created_at' => now(), 'updated_at' => now()],
            ['status_id' => 4, 'locale' => 'en', 'name' => 'Cancelled', 'created_at' => now(), 'updated_at' => now()],
            ['status_id' => 4, 'locale' => 'ar', 'name' => 'ملغى', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('status_translations')->insert($statusTranslations);
    }
}
