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
            ["name" => "ASHLEY HAN HUJIE", "score" => 6, "id" => "30121017", "avatar_type" => "1", "user_id" => 1], 
            ["name" => "CHAN RUI EN", "score" => 10, "id" => "30121106", "avatar_type" => "2", "user_id" => 2],
            ["name" => "CHEW MEI MEI", "score" => 3, "id" => "30121455", "avatar_type" => "1", "user_id" => 2],
            ["name" => "EMILE HONG JUN PENG", "score" => 5, "id" => "30121722", "avatar_type" => "1", "user_id" => 1],
            ["name" => "KONG NING FOO", "score" => 1, "id" => "30121839", "avatar_type" => "2", "user_id" => 2],
            ["name" => "LAM HU SHENG", "score" => 7, "id" => "30122486", "avatar_type" => "2", "user_id" => 1],
            ["name" => "LI CUI YONG", "score" => 2, "id" => "30128583", "avatar_type" => "1", "user_id" => 1],
            ["name" => "LIM KIM HAN, ROGER", "score" => 8, "id" => "30100329", "avatar_type" => "1", "user_id" => 1],
            ["name" => "LIM PEH SHENG", "score" => 9, "id" => "30106195", "avatar_type" => "2", "user_id" => 2],
            ["name" => "MICHAEL ROBERT CHENG KENG HO", "score" => 4, "id" => "30109398", "avatar_type" => "1", "user_id" => 1]
            ]);
    }
}
