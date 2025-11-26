<?php

namespace App\Http\Controllers\Hunter;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index()
    {
        // Menampilkan program yang aktif saja
        $programs = Program::where('is_public', true)->get();
        return view('hunter.reports.index', compact('programs'));
    }

    // --- INI YANG TADI HILANG ---
    public function create(Program $program)
    {
        // Menampilkan Form Submit Report untuk Program tertentu
        return view('hunter.reports.create', compact('program'));
    }
    // ----------------------------

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'severity' => 'required|in:low,medium,high,critical',
            'attachment' => 'nullable|file|max:10240|mimes:pdf,jpg,jpeg,png,txt,zip',
        ]);

        $path = null;
        if ($request->hasFile('attachment')) {
            // Simpan ke folder PRIVATE (tidak bisa diakses publik langsung)
            $path = Storage::putFile('private_reports', $request->file('attachment'));
        }

        Report::create([
            'hunter_id' => auth()->id(),
            'program_id' => $request->program_id,
            'title' => $request->title,
            'description' => $request->description,
            'severity' => $request->severity,
            'status' => 'new',
            'attachment_path' => $path,
        ]);

        return redirect()->route('hunter.reports.index')->with('success', 'Report submitted successfully.');
    }
}