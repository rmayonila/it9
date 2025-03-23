<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OldStudentController extends Controller
{
    public function verifyForm()
    {
        return view('verify');
    }

    public function verifyStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required|string|min:5'
        ]);

        $student = Student::where('student_id', $request->student_id)->first();

        if ($student) {
            Session::put('verified_student_id', $student->student_id);
            Session::put('student_data', $student);
            return response()->json([
                'found' => true,
                'student' => $student
            ]);
        }

        return response()->json(['found' => false]);
    }

    public function showRegistrationForm()
    {
        if (!Session::has('verified_student_id')) {
            return redirect()->route('verify');
        }

        $student = Session::get('student_data');
        return view('old-student', compact('student'));
    }
}