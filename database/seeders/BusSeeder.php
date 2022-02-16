<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('buses')->insert([
        //     [
        //         'number_plate' => 'KBV 310Y',
        //         'date_registered' => '2013-07-18',
        //         'designated_route' => 'THIKA',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'number_plate' => 'KCE 063T',
        //         'date_registered' => '2021-05-23',
        //         'designated_route' => 'MUTHAIGA',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ],
        //     [
        //         'number_plate' => 'KAW 235P',
        //         'date_registered' => '2010-12-09',
        //         'designated_route' => 'KAHAWA WEST',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]
        // ]);

        //create 20 buses
        Bus::factory()->forDriver()->count(10)->create();
    }
}
