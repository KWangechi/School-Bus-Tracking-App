<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
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
        $this->call([RoleSeeder::class,UserSeeder::class, DriverSeeder::class, ParentSeeder::class, BusSeeder::class, ChildSeeder::class]);
    }
}
