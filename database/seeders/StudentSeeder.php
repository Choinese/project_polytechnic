<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("students")->insert([
            ["name" => "student1", "score" => 1, "id" => "01001", "avatar_type" => "1"], 
            ["name" => "student2", "score" => 10, "id" => "01002", "avatar_type" => "2"]
            ]);
    }
}
