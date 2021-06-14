<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public static function insertData($data)
    {

        $value = DB::table('students')->where('id', $data['id'])->get();
        if ($value->count() == 0) {
            DB::table('students')->insert($data);
        }
    }
}
