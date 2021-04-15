<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(){

        $students = Student::all();
        return view('data.index', ['data'=>$students]);
    }
}
