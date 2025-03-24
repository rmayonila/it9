<?php

namespace App\Http\Controllers;

use App\Models\Transferee;
use Illuminate\Http\Request;

class TransfereeController extends Controller
{
    public function index()
    {
        return view('transferee');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_number' => 'required|string|size:11',
            'previous_school' => 'required|string',
            'program' => 'required|in:STEM,ABM',
            'academic_year' => 'required|string',
            'report_card' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'good_moral' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'Birth_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
    
        // Handle file uploads
        $reportCard = $request->file('report_card')->store('documents');
        $goodMoral = $request->file('good_moral')->store('documents');
        $birthCertificate = $request->file('Birth_certificate')->store('documents');
    
        // Save the transferee application
        $transferee = Transferee::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'previous_school' => $request->previous_school,
            'program' => $request->program,
            'academic_year' => $request->academic_year,
            'additional_info' => $request->additional_info,
            'report_card_path' => $reportCard,
            'good_moral_path' => $goodMoral,
            'birth_certificate_path' => $birthCertificate // Changed from Birth_certificate_path
        ]);
    
        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }
}