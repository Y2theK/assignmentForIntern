<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\StudentRegisterRequest;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest('id')->get();
        return view('students.index', compact('students'));
    }

    public function register()
    {
        $courses = Course::all();
        return view('students.register', compact('courses'));
    }
    public function store(StudentRegisterRequest $request)
    {
        //creating student data with db raw query
        $student = DB::insert("insert into students (name,email,nrc,dob) values (?,?,?,?)", [$request->name,$request->email,$request->nrc,$request->dob]);
        if (!$student) {
            return redirect()->route('students.list')->with('status', 'Student registered failed...');
        }
        //attaching many to many relationship with courses and students
        $student = Student::latest('id')->first();
        $courses = Course::find($request->courses);
        $student->courses()->attach($courses);
        return redirect()->route('students.list')->with('status', 'Student registered successfully...');
    }
}
