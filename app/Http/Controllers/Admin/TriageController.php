<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class TriageController extends Controller
{
    public function updateStatus(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|in:new,triaged,accepted,rejected,resolved,paid',
        ]);

        $report->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Report status updated.');
    }
}