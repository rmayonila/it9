<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transferee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Invalid credentials'
        ]);
    }

    public function dashboard()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $stats = [
            'total_students' => Student::count() ?? 0,
            'new_applications' => Transferee::where('created_at', '>=', now()->subDays(7))->count() ?? 0,
            'active_courses' => 4,
            'faculty_members' => 89
        ];

        $recent_applications = Transferee::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_applications'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];
}
