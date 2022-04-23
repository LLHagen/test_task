<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)
            ->hasTasks(mt_rand(3,10))
            ->create([
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'password' => bcrypt('12345')
            ]);
        User::factory(10)
            ->hasTasks(mt_rand(3,10))
            ->create();
    }
}
