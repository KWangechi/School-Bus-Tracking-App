<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role_id' => User::role_admin,
                'name' => 'John Diggle',
                'email' => "rkaranja303@gmail.com",
                'phone_number' => 23131313,
                'password' => bcrypt("12345qwerty"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_id' => User::role_driver,
                'name' => 'Oliver Queen',
                'email' => "oliverarrow@gmail.com",
                'phone_number' => 89248242,
                'password' => bcrypt("12345qwerty"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_id' => User::role_driver,
                'name' => 'Felicity Jones',
                'email' => "felicity@overwatch.com",
                'phone_number' => 3239131,
                'password' => bcrypt("12345qwerty"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_id' => User::role_parent,
                'name' => 'Jane Karanja',
                'email' => "janekaranja@gmail.com",
                'phone_number' => 98434821,
                'password' => bcrypt("12345qwerty"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        DB::table('users')->insert($users);
    }
}
