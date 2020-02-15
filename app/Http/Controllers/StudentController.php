<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('studentform', compact('students'));
    }

    public function savedata(Request $request)
    {
        $students = new Student;

        $students->fname = $request->input('fname');
        $students->lname = $request->input('lname');
        $students->course = $request->input('course');
        $students->section = $request->input('section');
        $students->save();
        return redirect('/student')->with('success', 'Data Saved');
    }

    public function updatedata(Request $request, $id)
    {
        $student = Student::find($id);
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->course = $request->input('course');
        $student->section = $request->input('section');
        $student->save();
    }
}
