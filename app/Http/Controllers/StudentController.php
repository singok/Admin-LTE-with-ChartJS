<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DataTables;

class StudentController extends Controller
{
    public function list() {
        $students = Student::all();
        // return DataTables::of($students)->make(true)
        dd(DataTables::of($students)->make(true));
    }
}
