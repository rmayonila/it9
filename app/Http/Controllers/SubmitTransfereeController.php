<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transferee;

class TransfereeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'previous_school' => 'required|string|max:255',
            'program' => 'required|string|in:STEM,HUMSS,ABM,TVL',
            'academic_year' => 'required|string|in:2025-2026,2026-2027',
            'additional_info' => 'nullable|string'
        ]);

        Transferee::create($validated);

        return redirect('/')->with('success', 'Your application has been submitted successfully!');
    }
}