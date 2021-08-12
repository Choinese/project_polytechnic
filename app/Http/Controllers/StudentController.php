<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {

        $students = Auth::user()->students;        
        $var = DB::table('students')
            ->select('score', DB::raw('COUNT(score)'))
            ->orderBy('score', 'ASC')
            ->groupBy('score')
            ->get();
            
        return view('data.index', compact('students', 'var'));
    }

    public function delete(Request $request)
    {
        $student = Student::findOrFail($request->id);
        $student->delete();
        return redirect()->back();
    }

    public function scoreEdit(Request $request)
    {

        $student = Student::findOrFail($request->id);
        $student->score = $request->score;
        $student->save();
        return redirect()->back();
    }
}
