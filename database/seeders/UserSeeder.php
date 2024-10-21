<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('    ---------------------------------------');
        $this->command->info('      Seeding Users Table ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');

        // Mandatory
        $user = User::query()
            ->create([
                'name' => 'Admin',
                'last_name' => 'test',
                'email' => 'admin@email.com',
                'password' => 'password',
                'email_verified_at' => now(),
                'active' => true,
                'guard_name' => 'admin'
            ]);

        User::query()
            ->create([
                'name' => 'Customer',
                'last_name' => 'test',
                'email' => 'customer@email.com',
                'password' => 'password',
                'email_verified_at' => now(),
                'active' => true,
                'guard_name' => 'web'
            ]);

        // Fake Data

        $this->command->info('    ---------------------------------------');
        $this->command->info('        Users Table Seeded ¯\_(ツ)_/¯');
        $this->command->info('    ---------------------------------------');
    }
}
