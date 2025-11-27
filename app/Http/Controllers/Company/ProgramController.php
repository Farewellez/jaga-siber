<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('company_id', auth()->id())->paginate(10);
        return view('company.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('company.programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scope' => 'required|string',
            'reward_min' => 'required|integer|min:0',
            'reward_max' => 'required|integer|min:0|gte:reward_min',
            // 'is_public' => 'boolean',
        ]);
        $isPublic = $request->has('is_public') ? true : false;

        Program::create([
            'company_id' => auth()->id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . time()),
            'description' => $request->description,
            'scope' => $request->scope,
            'reward_min' => $request->reward_min,
            'reward_max' => $request->reward_max,
            'is_public' => $isPublic,
        ]);

        return redirect()->route('company.programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        if ($program->company_id !== auth()->id()) {
            abort(403);
        }
        return view('company.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        if ($program->company_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scope' => 'required|string',
            'reward_min' => 'required|integer|min:0',
            'reward_max' => 'required|integer|min:0|gte:reward_min',
            // 'is_public' => 'boolean',
        ]);
        $isPublic = $request->has('is_public') ? true : false;
        $program->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title . '-' . time()),
            'description' => $request->description,
            'scope' => $request->scope,
            'reward_min' => $request->reward_min,
            'reward_max' => $request->reward_max,
            'is_public' => $isPublic,
        ]);

        return redirect()->route('company.programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        if ($program->company_id !== auth()->id()) {
            abort(403);
        }
        $program->delete();
        return redirect()->route('company.programs.index')->with('success', 'Program deleted successfully.');
    }
}