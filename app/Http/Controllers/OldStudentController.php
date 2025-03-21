<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OldStudentController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'student_id' => 'required|string',
            'password' => 'required|string',
        ]);

        $student = Student::where('student_id', $credentials['student_id'])->first();

        if (!$student || !Hash::check($credentials['password'], $student->password)) {
            return back()->withErrors([
                'student_id' => 'The provided credentials do not match our records.',
            ]);
        }

        Auth::login($student);
        return redirect('/dashboard')->with('success', 'Welcome back, ' . $student->name . '!');
    }

    public function dashboard()
    {
        $student = Auth::user();
        return view('student.dashboard', compact('student'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}