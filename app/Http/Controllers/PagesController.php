<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Page;
use Illuminate\Support\Facades\Session;


use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
  public function index()
  {
    $students = Auth::user()->students;
    return view('data.index', compact('students'));
  }

  /**public function index()
  {
    $students = Student::all();
    $var = DB::table('students');
    return view('data.index', compact('students', 'var'));
  }**/

  public function uploadFile(Request $request)
  {

    if ($request->input('submit') != null) {

      $file = $request->file('file');

      // File Details 
      $filename = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $tempPath = $file->getRealPath();
      $fileSize = $file->getSize();
      $mimeType = $file->getMimeType();

      // Valid File Extensions
      $valid_extension = array("csv");

      // 2MB in Bytes
      $maxFileSize = 2097152;

      // Check file extension
      if (in_array(strtolower($extension), $valid_extension)) {

        // Check file size
        if ($fileSize <= $maxFileSize) {

          // File upload location
          $location = 'uploads';

          // Upload file
          $file->move($location, $filename);

          // Import CSV to Database
          $filepath = public_path($location . "/" . $filename);

          // Reading file
          $file = fopen($filepath, "r");

          $importData_arr = array();
          $i = 0;

          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);

            // Skip first row (Remove below comment if you want to skip the first row)
            /*if($i == 0){
                    $i++;
                    continue; 
                 }*/
            for ($c = 0; $c < $num; $c++) {
              $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
          }
          fclose($file);

          // Insert to MySQL database
          foreach ($importData_arr as $importData) {

            $insertData = array(
              "name" => $importData[0],
              "id" => $importData[1],
              "avatar_type" => $importData[2],
              "score" => $importData[3],
              "user_id" => Auth::id()
            );
            Page::insertData($insertData);
          }

          Session::flash('message', 'Import Successful.');
        } else {
          Session::flash('message', 'File too large. File must be less than 2MB.');
        }
      } else {
        Session::flash('message', 'Invalid File Extension.');
      }
    }

    // Redirect to index
    return redirect()->back();
  }
}
