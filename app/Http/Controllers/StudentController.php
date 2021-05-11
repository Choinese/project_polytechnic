<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::all();
        return view('data.index', ['data' => $students]);
    }

    public function delete(Request $request)
    {
        $student = Student::findOrFail($request->id);
        $student->delete();
        return redirect()->back();
    }

    public function scoreEdit(Request $request)
    {
        dd($request->all());
        $student = Student::findOrFail($request->id);
        $student->score = $request->score;
        $student->save();
        return redirect()->back();
    }
}
