<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                    'name' => 'Viraj',

                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('123'),

                    'is_admin' => '1',

                    'created_at' => date("Y-m-d h:i:s")
                ],

            ];
            $user_i = DB::table('users')->insert($users);


    }


}
