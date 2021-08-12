<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        $user_data = [
            [
                'name' => 'Li Jialong',
                'email' => 'lijia@gmail.com',
                'password' => bcrypt('lijia123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Li Jialong2',
                'email' => 'lijia@gmail.com2',
                'password' => bcrypt('lijia123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('users')->insert($user_data);
    }
}
