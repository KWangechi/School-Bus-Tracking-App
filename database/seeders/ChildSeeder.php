<?php

namespace Database\Seeders;

use App\Models\Child;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $children = [
        //     [
        //     'parent_id'=> 1,
        //     'name' => 'Jane Doe',
        //     'class' => "Grade Four",
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        //     ],

        //     [
        //         'parent_id'=> 2,
        //         'name' => 'King Killa',
        //         'class' => "Class Two",
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //         ],
        // ];
        // DB::table('children')->insert(
        //     $children
        // );

        //create 20 children
        Child::factory()->count(10)->forParent()->create();
    }
}
