<?php

namespace Database\Seeders;

use App\Models\Guardian;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Guardian::factory()->hasChild(rand(1,3))->count(10)->create();
        app(\Database\Factories\GuardianFactory::class)->hasChild(rand(1,3))->count(10)->create();
    }
}
